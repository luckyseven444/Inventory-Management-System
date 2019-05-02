<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Session; 

class supplierController extends Controller
{
  public function index()
  {
    $data['suppliers'] = Supplier::paginate();
    return view('pages.supplier_list', $data);
  }
  
  public function addSupplier()
  {
    $data['supplier'] = null;
    return view('pages.add_supplier', $data);
  }
  
  public function supplierStore(SupplierRequest $request)
  {
    try {
    
    $supplier = new Supplier;
    $supplier->name = $request->name;
    $supplier->address = $request->address;
    $supplier->email = $request->email;

    $check = Supplier::where('code', $request->code)->count();
    if($check===0){
    $supplier->code = $request->code;
    }
    
    $supplier->save();
    
    Session::flash('alert-success', 'Data Stored Successfully');
    return redirect('supplier');
    } catch (\Exception $e) {
    Session::flash('alert-danger', 'Duplicate Data');
    return redirect('supplier');
    }
  }
  
  public function updateSupplier(Request $request)
  {
    $data['supplier'] = Supplier::find($request->supplier_id);
    return view('pages.add_supplier', $data);
  }  
  
  public function supplierRestore(Request $request)
  {
    try {
    $id = $request->id ? $request->id : '';
    $supplier = Supplier::updateOrCreate(array('id' => $id));
    $supplier->name = $request->name;
    $supplier->address = $request->address;
    $supplier->email = $request->email;

    $check = Supplier::where('code', $request->code)->count();
    if($check===0 || ($check===1 && !$check>1)){
    $supplier->code = $request->code;
    }
    $supplier->save();
    
    Session::flash('alert-success', 'Data Stored Successfully');
    return redirect('supplier');
    } catch (\Exception $e) {
    Session::flash('alert-danger', 'Duplicate Data');
    return redirect('supplier');
    }
  }   
  
  public function deleteSupplier(Request $request)
  {
    try {
    $supplier = Supplier::find($request->supplier_id);
    $supplier->delete();
    Session::flash('alert-danger', 'Deleted Successfully');
    return redirect('supplier');
    } catch (\Exception $e) {
    Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
    return redirect('supplier');
    }
  }  
}
