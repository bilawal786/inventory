<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sales;
use App\Customer;
use App\Product;
class SalesController extends Controller
{
    public function index(){

        $customers = Customer::where('status', '1')->get();
        $sale= Sales::all();

        return view('admin.sales.index', compact('customers','sale'));
    }
   public function create(){

    $customers = Customer::where('status', '1')->get();
    $products = Product::where('status', '1')->get();
       return view('admin.sales.create', compact('products','customers'));
   }

    public function store(Request $request){
        $products = Product::where('status', '1')->first();
       $customer = Customer::where('status', '1')->where('id', $request->customer_id)->first();

        $sale = new Sales();
        foreach($request->name as $name)
        {
            $data2[]=$name;
            $sale->name=json_encode($data2);
        }
        foreach($request->stock as $stock)
        {
            $data3[]=$stock;
            $sale->stock=json_encode($data3);
        }
        foreach($request->product_id as $product_id)
        {
            $data4[]=$product_id;
            $sale->product_id=json_encode($data4);
        }
        foreach($request->price as $price)
        {
            $data5[]=$price;
            $sale->price=json_encode($data5);
        }
        foreach($request->quantity as $quantity)
        {
            $data[]=$quantity;
            $sale->quantity=json_encode($data);
        }
        foreach($request->code as $code)
        {
            $data7[]=$code;
            $sale->code=json_encode($data7);
        }
        foreach($request->subtotal as $subtotal)
        {
            $data8[]=$subtotal;
            $sale->subtotal=json_encode($data8);
        };
        $sale->grandtotal=$request->grandtotal;
        $sale->save();
        $notification = array(
            'messege' => 'Sale add Successfully!',
            'alert-type' => 'success'
        );


       return view('admin.invoice.index' , compact('customer','sale'))->with($notification);;

   }
   public function update(Request $request ,$id){

    $sale = Sales::find($id);

    foreach($request->name as $name)
        {
            $data2[]=$name;
            $sale->name=json_encode($data2);
        }
        foreach($request->stock as $stock)
        {
            $data3[]=$stock;
            $sale->stock=json_encode($data3);
        }
        foreach($request->product_id as $product_id)
        {
            $data4[]=$product_id;
            $sale->product_id=json_encode($data4);
        }
        foreach($request->price as $price)
        {
            $data5[]=$price;
            $sale->price=json_encode($data5);
        }
        foreach($request->quantity as $quantity)
        {
            $data[]=$quantity;
            $sale->quantity=json_encode($data);
        }
        foreach($request->code as $code)
        {
            $data7[]=$code;
            $sale->code=json_encode($data7);
        }
        $sale->grandtotal=$request->grandtotal;

        $sale->save();

        $notification = array(
            'messege' => 'sales Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('sales.index')->with($notification);
        }
    public function edit($id){
            $products = Product::where('status', '1')->get();
            $sale=Sales::find($id);
            return view('admin.sales.edit', compact('sale','products'));
            }
    public function delete($id){
        $sale = Sales::find($id);
        $sale->delete();
        $notification = array(
            'messege' => 'Sale Delete!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
        }
        public function view($id){

            $sale=Sales::find($id);
            $customer = Customer::where('status', '1')->get();
            $products =Product::where('status','1')->get();
            return view('admin.sales.show' , compact('customer','sale','products'));


        }


}


