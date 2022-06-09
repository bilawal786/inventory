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
        
        return view('admin.Sales.index', compact('customers','sale'));
    }
   public function create(){
    $products = Product::where('status', '1')->get();
       return view('admin.Sales.create', compact('products'));
   }
   
    public function store(Request $request){
      
        $sale = new Sales();
        
       
        
        $sale->name = $request->name;
        
        $sale->stock = $request->stock;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->code = $request->code;
        $sale->subtotal = $request->subtotal;
        $sale->grandtotal=$request->grandtotal;
       
        $sale->save();
        return response()->json(['success'=>'Data is successfully added']);
       
        
    
   }

  


  
       

   
}
