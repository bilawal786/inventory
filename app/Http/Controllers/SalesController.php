<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
class SalesController extends Controller
{
    public function index(){
        $customers = Customer::where('status', '1')->get();
        return view('admin.Sales.index', compact('customers'));
    }
   public function create(){
    $products = Product::where('status', '1')->get();
       return view('admin.Sales.create', compact('products'));
   }

  


  
       

   
}
