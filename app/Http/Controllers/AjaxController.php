<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function create($id )
    {
      $products = Product::where('id','=',$id)->first();
      return response()->json($products);
     
    }
    public function approve(Request $request){

      
    }

    public function store(Request $request)
    {
         $request->validate([
          'name'      => 'required',
          'price'     => 'required',
          'quantity'    => 'required',
          'subtotal'   => 'required',
        ]);

        $data = $request->all();
        

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
