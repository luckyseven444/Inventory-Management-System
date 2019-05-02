<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Stockin;
    use App\Product;
    use App\Supplier;
    use App\Challan;
    use App\Http\Requests\StockinRequest;
    use App\Http\Requests\EditStockinRequest;
    use Illuminate\Support\Facades\Session;
    use Carbon\Carbon;

    
    class stockinController extends Controller
    {
        public function index()
        {
            $data['stockins'] = Stockin::with('products', 'suppliers', 'challans')->paginate(10);
            return view('pages.stockin_list', $data);
        }
        
        public function addStockin()
        {
            $data['stockin'] = null;
            $data['suppliers'] = Supplier::pluck('name', 'id');
            return view('pages.add_stockin2', $data);
        }
        
        public function search(Request $request)
        {
            if ($request->ajax()) {
                $output = "";
                $products = Product::where('product', 'LIKE', '%' . $request->product . "%")->get();
                
                if ($products) {
                    foreach ($products as $value) {
                        $output .= '<li>' . $value->product . '</li>';
                    }
                    return \Response($output);
                }
            }
        }

        public function checkStock(){

            $data['products'] = Product::pluck('product', 'id');
            return view('pages.stock_check', $data);
        }

        public function checkStockAjax(Request $request){

            $products = Stockin::where('product_id', $request->product_id)->get();
            $name=Product::where('id',$request->product_id)->value('product');

            $output = "<table class='table'><thead><tr><th>Product</th><th>Lot</th><th>In Date</th><th>Unit Price</th><th>Lot Qty</th><th>Actions</th><th>Total Qty.</th></tr></thead><tbody>";

            echo $output;

                echo "<tr>";
                    echo '<td>'.$name.'</td>';

                    echo '<td>';
                        echo '<table>';
                        foreach ($products as $value) {
                         echo '<tr>';
                            echo '<td>' . $value->lot . '</td>';
                        echo '</tr>';
                        }
                        echo '</table>';
                     echo '</td>';

                     echo '<td>';
                      echo '<table>';
                        foreach ($products as $value) {
                          echo '<tr>';

                          echo '<td>' . $value->created_at . '</td>';

                           echo '</tr>';
                         }
                        echo '</table>';
                     echo '</td>';

                    echo '<td>';
                    echo '<table>';
                    foreach ($products as $value) {
                        echo '<tr>';
                        echo '<td>' . $value->unit_price . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</td>';

                    echo '<td>';
                    echo '<table>';
                    $temp=array();
                    foreach ($products as $value) {
                        echo '<tr>';
                        echo '<td>' . $value->current_quantity . '</td>'; $temp[]=$value->quantity;
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</td>';

                    echo '<td>';
                    echo '<table>';

                    foreach ($products as $value) {
                        echo '<tr>';
                        echo '<td>';

                        echo '<a'; echo ' href="stockin/update-stockin?stockin_id='.$value->id.'"';
                        echo 'style="margin-right: 5px;" class='.'"text-success"'; echo'>'; echo 'Edit'.
                            '</a>';

                        echo '<a'; echo ' href="stockin/delete-stockin?stockin_id='.$value->id.'"';
                        echo ' class='.'"text-danger"'; echo'>'; echo 'Delete'.
                            '</a>';


                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</td>';

                   echo '<td>'.array_sum($temp).'</td>';

            echo "</tbody></table>";
            exit;
        }

        public function stockinStore(Request $request)
        {
            $request->validate([
                'supplier' => 'required',
                'product.*' => 'required',
                'quantity.*' => 'required',
                'unit_price.*' => 'required',
                'discount.*' => 'required',
                'total.*' => 'required',
            ]);

                $product = $request->product;
                $quantity = $request->quantity;
                $discount = $request->discount;
                $unit_price = $request->unit_price;
                $total = $request->total;
            
            
                //No need to fetch last inserted product ids
                //$ids = [];
//                for ($i = 0; $i < count($product); $i++) {
//                    $data['product'] = $product[$i];
//                    //$id = Product::create($data)->id;
//                    //array_push($ids, $id);
//                }
                
                foreach ($product as $value){
                    Product::firstOrCreate(['product' => $value]);
                }
                
                $challan = new Challan();
                $challan->challan = $request->supplier . '/' . Carbon::now();
                
                $final = 0;
                foreach ($total as $key => $value) {
                    $final += $value;
                }
                $challan->cost = $final;
                
                $challan->supplier_id = $request->supplier;
                $challan->date = Carbon::now();
                $challan->save();
                
                
                for ($i = 0; $i < count($product); $i++) {
                    $stockin = new Stockin();

                    $y=Product::select('id', 'product')->where('product',$product[$i])->first();
                    $stockin->lot = $y->product . '/' . Carbon::now();

                    $stockin->product_id = $y->id;
                    
                    $stockin->supplier_id = $request->supplier;
                    $stockin->unit_price = $unit_price[$i];
                    $stockin->quantity = $quantity[$i];
                    $stockin->current_quantity = $quantity[$i];
                    $stockin->discount = $discount[$i];
                    $stockin->cost = $total[$i];
                    
                    $new = Challan::select('id')->where('supplier_id', $request->supplier)->first();
                    $stockin->challan_id = $new->id;
                    
                    $stockin->save();
                }
    
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('check-stock');
        }
        
        public function updateStockin(Request $request)
        {
            $data['stockin'] = Stockin::find($request->stockin_id);
            $product_id=Stockin::where('id',$request->stockin_id)->value('product_id');
            $data['product']=Product::where('id',$product_id)->value('product');
            return view('pages.edit_stockin', $data);
        }
        
        public function stockinRestore(EditStockinRequest $request)
        {

                $stockin = Stockin::updateOrCreate(array('id' => $request->id));
                
                $stockin->product_id = $request->product_id;
                
                $lot = Stockin::select('lot')->where('id', $request->id)->first();
                $stockin->lot = $lot->lot;
                
                $supplier = Stockin::select('supplier_id')->where('id', $request->id)->first();
                $stockin->supplier_id = $supplier->supplier_id;
                
                $stockin->unit_price = $request->unit_price;
                $stockin->quantity = $request->quantity;
                $stockin->discount = $request->discount;
                $stockin->cost = $request->total;
                $challan = Stockin::select('challan_id')->where('id', $request->id)->first();
                $stockin->challan_id = $challan->challan_id;
                
                $stockin->save();
                
                Session::flash('alert-success', 'Data Stored Successfully');
                return redirect('check-stock');
            
        }
    
        public function deleteStockin(Request $request)
        {
            try {
                $stockin = Stockin::find($request->stockin_id);
                $stockin->delete();
                Session::flash('alert-danger', 'Deleted Successfully');
                return redirect('check-stock');
            } catch (\Exception $e) {
                Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
                return redirect('check-stock');
            }
        }
    }
