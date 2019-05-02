<?php

namespace App\Http\Controllers;
use App\Http\Requests\StockoutRequest;
use App\Stockin;
use App\Stockout;
use App\Customer;
use App\Product;
use App\ChallanOut;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Session;


class stockoutController extends Controller
{
    public function index()
    {
        $data['stockouts'] = Stockout::with('products', 'customers')->paginate(10);
        return view('pages.stockout_list', $data);
    }

    public function addStockout()
    {
        $data['stockout'] = null;
        $data['customers'] = Customer::pluck('name', 'id');
        $data['products'] = Product::pluck('product', 'id');

        return view('pages.add_stockout3', $data);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {

            $products = Stockin::where('product_id', $request->product_id)->get();

            if ($products) {
                foreach ($products as $key=>$value) {
                    $quantity[] = $value->quantity;
                }

                return \Response('Available Quantity:'.array_sum($quantity));
            }
        }
    }

    public function searchMultiselect(Request $request){

            $products = Stockin::whereIn('product_id', $request->product_id)->orderBy('product_id')->get();

            $temp_ids=array();

            foreach($products as $key=>$value){$temp_ids[] = $value->product_id;} //print_r(array_unique($temp_ids)) ;

            $output = "<table class='table'><thead><tr><th>Product</th><th>Order Qty.</th><th>Lot</th><th>Unit Price</th><th>Selling Unit Price</th><th>Available Qty</th><th>Selling Quantity</th><th>Total</th></tr></thead><tbody class='tbody'>";

            echo $output;

            foreach (array_unique($temp_ids) as $key=>$value) {

                $product_id[] = $value;

                $name=Product::where('id', $value)->first();

                $lots= Stockin::select('lot')->where('product_id',$value)->get();
                $unit_prices= Stockin::select('unit_price')->where('product_id',$value)->get();
                $current_quantitys=Stockin::select('current_quantity')->where('product_id',$value)->get();

                echo "<tr class='pinx'>";

                echo "<td>". $name->product ."</td>";
                echo '<input type="hidden" value='.$name->product. ' name="product_name[]">';
                echo '<input type="hidden" value='.$name->id. ' name="product_id[]">';


                echo "<td>". '<input type="text" size="4" name="order_qty[]">' ."</td>";

                echo "<td class='my_custom'>"; echo'<table>';
                foreach ($lots as $lot ){
                    echo "<tr><td>".$lot->lot."</td></tr>";
                    echo '<input type="hidden" value='.$lot->lot. ' name="lot['.$name->product.'][]">'."</td></tr>";
                    echo '<input type="hidden" value='.Stockin::where('lot',$lot->lot)->value('id'). ' name="id['.$name->product.'][]">'."</td></tr>";
                }
                echo '</table>';
                echo "</td>";

                echo "<td class='my_custom'>"; echo'<table>';
                foreach ($unit_prices as $unit_price ){
                    echo "<tr><td>".$unit_price->unit_price."</td></tr>";
                    echo '<input type="hidden" value='.$unit_price->unit_price. ' name="unit_price['.$name->product.'][]">'."</td></tr>";
                }
                echo '</table>';
                echo "</td>";

                echo "<td>"; echo'<table>';
                for ($i=0;$i<count($unit_prices);$i++){
                    echo "<tr><td>".'<input type="text" size="4" name="sell_un_pr['.$name->product.'][]">'."</td></tr>";
                }
                echo '</table>';
                echo "</td>";

                echo "<td class='my_custom'>"; echo'<table>';
                foreach ($current_quantitys as $quantity ){
                    echo "<tr><td>".$quantity->current_quantity."</td></tr>";
                    echo '<input type="hidden" value='.$quantity->current_quantity. ' name="current_quantity['.$name->product.'][]">'."</td></tr>";
                }
                echo '</table>';
                echo "</td>";

                echo "<td>"; echo'<table>';
                for ($i=0;$i<count($unit_prices);$i++){
                    echo "<tr><td>".'<input type="text" class="sell_qty" size="4" name="sell_qty['.$name->product.'][]">'."</td></tr>";
                }
                echo '</table>';
                echo "</td>";

                echo "<td>".'<div class="total"'.'></div>'."</td>";

                echo "</tr>";
                }

            echo "</tbody></table>";
            exit;
    }

//    public function checkStockout(){
//
//        $data['products'] = Product::pluck('product', 'id');
//        return view('pages.stockout_check', $data);
//    }
//
//    public function checkStockoutAjax(Request $request){
//
//        $stockin=Stockin::where('product_id',$request->product_id)->get();
//
//        $output = "<table class='table'><thead><tr><th>Product</th><th>Qty.</th><th>Price</th></tr></thead><tbody>";
//
//        echo $output;
//
//        echo "<tr>";
//
//        echo '<td>';
//        echo '<table>';
//
//            echo '<tr>';
//            echo '<td>' . Product::where('id',$request->product_id)->value('product') . '</td>';
//            echo '</tr>';
//
//        echo '</table>';
//        echo '</td>';
//
//        echo '<td>';
//        echo '<table>';
//        foreach ($stockout as $value) {
//            echo '<tr>';
//
//            echo '<td>' . $value->selling_quantity . '</td>';
//
//            echo '</tr>';
//        }
//        echo '</table>';
//        echo '</td>';
//
//        echo '<td>';
//        echo '<table>';
//        foreach ($stockout as $value) {
//            echo '<tr>';
//            echo '<td>' . $value->selling_unit_price . '</td>';
//            echo '</tr>';
//        }
//        echo '</table>';
//        echo '</td>';
//
//        echo "</tbody></table>";
//        exit;
//    }

    public function stockoutStore(Request $request){

       $request->validate([
           'customer' => 'required',
           'sell_qty.*' => 'required',
           'order_qty.*' => 'required',
           'sell_un_pr.*' => 'required',
       ]);

        $ids=$request->id;
        $product_ids = $request->product_id;
        $lots=$request->lot;
        $sell_quantity = $request->sell_qty;
        $current_quantity = $request->current_quantity;
        $unit_price = $request->sell_un_pr;

        $challanout = new ChallanOut();
        $challanout->challan = 'customer_id:'. $request->customer . '/' . Carbon::now();
        $challanout->customer_id=$request->customer;

        $final = 0;
        foreach ($current_quantity as $key => $value) {
            foreach ($value as $top){
                $final += ($current_quantity[$key][array_search($top,$value)])*($unit_price[$key][array_search($top,$value)]);
            }
        }
        $challanout->payment = $final;
        $challanout->save();

        foreach ($unit_price as $key=>$value) {

            foreach ($value as $top){

                $stock_out = new Stockout();
                $stock_out->challan_out_id = $challanout->id;
                $stock_out->customer_id = $request->customer;
                $stock_out->product_id = $product_ids[array_search($key, array_keys($lots))];
                $stock_out->selling_quantity = $sell_quantity[$key][array_search($top,$value)];
                Stockin::where('id', '=', $ids[$key][array_search($top,$value)])
                    ->update(
                    ['current_quantity' => ( ($current_quantity[$key][array_search($top,$value)])-($stock_out->selling_quantity) )]
                );
                $stock_out->selling_unit_price = $unit_price[$key][array_search($top,$value)];

                $stock_out->save();
            }
        }

        \Session::flash('alert-success', 'Data Stored Successfully');
        return redirect('check-stockt');

    }

//    public function updateStockout(Request $request)
//    {
//        $data['stockout'] = Stockout::find($request->stockout_id);
//        $data['customers'] = Customer::pluck('name', 'id');
//        $data['products'] = Product::pluck('product', 'id');
//        return view('pages.edit_stockout', $data);
//    }
//
//    public function stockoutRestore(Request $request){
//
//        $request->validate([
//            'customer' => 'required',
//            'product' => 'required',
//            'quantity' => 'required',
//            'unit_price' => 'required',
//            'discount' => 'required',
//            'cost' => 'required',
//        ]);
//
//
//        $customer_id = $request->customer;
//        $product_id = $request->product;
//        $quantity = $request->quantity;
//        $unit_price = $request->unit_price;
//        $discount = $request->discount;
//        $cost = $request->cost;
//
//            $stockout = Stockout::updateOrCreate(array('id' => $request->id));;
//            $stockout->stockout = $request->stockout;
//            $stockout->customer_id = $customer_id;
//            $stockout->product_id = $product_id;
//            $stockout->unit_price = $unit_price;
//            $stockout->quantity = $quantity;
//            $stockout->discount = $discount;
//            $stockout->cost = $cost;
//
//            $stockout->save();
//
//
//        Session::flash('alert-success', 'Data Stored Successfully');
//        return redirect('check-stockt');
//
//    }
//
//    public function deleteStockout(Request $request)
//    {
//        try {
//            $stockout = Stockout::find($request->stockout_id);
//            $stockout->delete();
//            Session::flash('alert-danger', 'Deleted Successfully');
//            return redirect('check-stock');
//        } catch (\Exception $e) {
//            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
//            return redirect('check-stock');
//        }
//    }
}
