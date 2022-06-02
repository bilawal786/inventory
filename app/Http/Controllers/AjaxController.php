<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function create()
    {

      return view('ajax-request');
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
