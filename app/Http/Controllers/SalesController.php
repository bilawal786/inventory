<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(){
        $customers = Customer::where('status', '1')->get();
        return view('admin.Sales.index', compact('customers'));
    }
   public function create(){
       return view('admin.sales.index');
   }
}
