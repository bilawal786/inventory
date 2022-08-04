<?php

namespace App\Http\Controllers;

use App\Categor;
use App\Category;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(){
        $incomes=Income::all();
        return view('admin.income.index',compact('incomes'));
    }
    public function category(){
        $catego=Categor::all();
        return view('admin.income.category',compact('catego'));
    }
    public function create(){
        $category=Categor::where('name','income')->get();
        return view('admin.income.create',compact('category'));
    }
    public function store(Request $request){

        $income =new Income();
        $income->category_id=$request->category_id;
        $income->user_id=Auth::user()->id;
        $income->date=$request->date;
        $income->price=$request->price;
        $income->description=$request->description;
        $income->save();
        $notification = array(
            'messege' => 'Income Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request,$id){
        $income =Income::find($id);
        $income->category_id=$request->category_id;
        $income->user_id=Auth::user()->id;
        $income->date=$request->date;
        $income->price=$request->price;
        $income->description=$request->description;
        $income->save();
        $notification = array(
            'messege' => 'Income Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id){
            $incomeedit=Income::find($id);
            $categoryes=Categor::where('name','income')->get();
            return view('admin.income.edit',compact('incomeedit','categoryes'));
    }
    public function delete($id){
        $income=Income::find($id);
        $income->delete();
        $notification = array(
            'messege' => 'Income Delete Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}
