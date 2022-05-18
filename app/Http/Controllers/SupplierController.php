<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::where('status', '1')->get();
        return view('admin.supplier.index', compact('suppliers'));
    }
    public function create(){
        return view('admin.supplier.create');
    }
    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->city = $request->city;
        $supplier->address = $request->address;
        $supplier->notes = $request->notes;

        $supplier->save();
        $notification = array(
            'messege' => 'Supplier Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        $notification=array(
            'messege'=>'Supplier Deleted !',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
}
