<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Session;

class customerController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::paginate();
        return view('pages.customer_list', $data);
    }

    public function addCustomer()
    {
        $data['customer'] = null;
        return view('pages.add_customer', $data);
    }

    public function customerStore(CustomerRequest $request)
    {
        try {

            $customer = new Customer;
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->email = $request->email;

            $check = Customer::where('code', $request->code)->count();
            if($check===0){
                $customer->code = $request->code;
            }

            $customer->save();

            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('customer');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Duplicate Data');
            return redirect('customer');
        }
    }

    public function updateCustomer(Request $request)
    {
        $data['customer'] = Customer::find($request->customer_id);
        return view('pages.add_customer', $data);
    }

    public function customerRestore(Request $request)
    {
        try {
            $id = $request->id ? $request->id : '';
            $customer = Customer::updateOrCreate(array('id' => $id));
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->email = $request->email;

            $check = Customer::where('code', $request->code)->count();
            if($check===0 || ($check===1 && !$check>1)){
                $customer->code = $request->code;
            }
            $customer->save();

            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('customer');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Duplicate Data');
            return redirect('customer');
        }
    }

    public function deleteCustomer(Request $request)
    {
        try {
            $customer = Customer::find($request->customer_id);
            $customer->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('customer');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
            return redirect('customer');
        }
    }
}
