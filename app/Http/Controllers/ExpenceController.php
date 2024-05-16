<?php

namespace App\Http\Controllers;

use App\Categor;
use App\Category;
use App\Expences;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenceController extends Controller
{
    public function index(){
        $expences=Expences::all();

        return view('admin.expences.index',compact('expences'));
    }
    public function category(){
        $catego=Categor::where('types','expence')->get();
        return view('admin.expences.category',compact('catego'));
    }
    public function create(){
        $catego=Categor::where('types','expence')->get();
        return view('admin.expences.create',compact('catego'));
    }
    public function store(Request $request){

        $expence =new Expences();
        $expence->category_id=$request->category_id;
        $expence->user_id=Auth::user()->id;
        $expence->date=$request->date;
        $expence->price=$request->price;
        $expence->description=$request->description;
        $expence->save();
        $notification = array(
            'messege' => 'Expence Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $expenedit=Expences::find($id);
       $categoryes=Categor::where('types','expences')->get();
        return view('admin.expences.edit',compact('expenedit','categoryes'));
    }
    public function delete($id)
    {
        $expences=Expences::find($id);
        $expences->delete();
        $notification = array(
            'messege' => 'Expences Delete Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request ,$id)
    {
        $expence= Expences::find($id);
        $expence->category_id=$request->category_id;
        $expence->user_id=Auth::user()->id;
        $expence->date=$request->date;
        $expence->price=$request->price;
        $expence->description=$request->description;
        $expence->save();
        $notification = array(
            'messege' => 'Expence update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
