<?php

namespace App\Http\Controllers;

use App\categor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorController extends Controller
{
    public function store(Request $request)
    {
        $categortype= new categor();
        $categortype->user_id=Auth::user()->id;
        $categortype->types=$request->types;
        $categortype->name=$request->name;
        $categortype->save();
        $notification = array(
            'messege' => 'Category Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $deletecet=Categor::find($id);
        $deletecet->delete();
        $notification = array(
            'messege' => 'Category delete Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
           $editcate=Categor::find($id);
           return view('admin.expences.editcategory',compact('editcate'));
    }
    public function update(Request $request,$id)
    {
        $categortype = Categor::find($id);
        $categortype->user_id=Auth::user()->id;
        $categortype->types =$request->types;
        $categortype->name = $request->name;
        $categortype->save();
        $notification = array(
            'messege' => 'Category update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
