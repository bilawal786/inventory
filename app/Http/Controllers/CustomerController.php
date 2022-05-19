<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::where('status', '1')->get();
        return view('admin.Customer.index', compact('customers'));
    }
    public function create(){
        return view('admin.Customer.create');
    }
    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->notes = $request->notes;

        $customer->save();
        $notification = array(
            'messege' => 'Customer Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function delete($id){
        $customer=Customer::find($id);
        $customer->delete();

            $notification=array(
                'message'=> 'Customer Delete Successfully',
                'alert-type'=>'error'
            );
        return Redirect()->back()->with($notification);

    }
    public function edit(){

        $customers = Customer::where('status', '1')->get();
        return view('admin.Customer.edit', compact('customers'));
    }

    public function update(){
        $customers = Customer::find($id);
        $customer->name =$request->name;
        $customer->email = $request->email;
        $customer->phone =$request->phone;
        $customer->address =$request->name;

    }

}
