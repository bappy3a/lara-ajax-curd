<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home()
    {
    	$datas = Customer::latest()->paginate(5);
    	return view('customer.home',compact('datas'));
    }
    public function add(Request $request)
    {
    	$customer = new Customer;
    	$customer->name = $request->name;
    	$customer->phone = $request->phone;
    	$customer->email = $request->email;
    	$customer->save();
    	if ($customer->save()) {
    		return response()->json("success");
    	}else{
    		return response()->json("error");
    	}
    	
    }
    public function get()
    {
    	$datas = Customer::latest()->paginate(5);   
    	return view('customer.response',compact('datas'));
    }

    public function viewdata($id)
    {
    	$customer = Customer::find($id);
    	return $customer;
    }

    public function deletedata($id)
    {
    	$delete = Customer::find($id)->delete();
    	if($delete){
    		return response()->json("success");
    	}else{
    		return response()->json("error");
    	}
    }

}
