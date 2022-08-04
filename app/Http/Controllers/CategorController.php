<?php

namespace App\Http\Controllers;

use App\categor;
use Illuminate\Http\Request;

class CategorController extends Controller
{
    public function store(Request $request)
    {
        $categortype= new categor();
        $categortype->name='expences';
        $categortype->types=$request->types;
        $categortype->save();
        $notification = array(
            'messege' => 'Category Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function stores(Request $request)
    {
        $categortype= new categor();
        $categortype->name='income';
        $categortype->types=$request->types;
        $categortype->save();
        $notification = array(
            'messege' => 'Category Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function index(){
        $catego=Categor::all();
        dd($catego);
        return view('admin.expences.category',compact('catego'));
    }
    public function delete($id){
        $deletecet=Categor::find($id);
        $deletecet->delete();
        $notification = array(
            'messege' => 'Category Added Successfully!',
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
        $categortype->name = 'expences';
        $categortype->types = $request->types;
        $categortype->save();
        $notification = array(
            'messege' => 'Category update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
