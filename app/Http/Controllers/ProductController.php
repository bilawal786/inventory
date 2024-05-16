<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', '1')->get();
        return view('admin.product.index', compact('products'));
    }
    public function create(){
        $categories = Category::where('status' , '1')->get();
        return view('admin.product.create', compact('categories'));
    }
    public function store(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->alert = $request->alert;
        $product->code = $request->code;
        $product->unit = $request->unit;
        $product->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $name = time().'product'.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'product/';
            $image->move($destinationPath, $name);
            $product->image = 'product/'.$name;
        }
        $product->save();
        $notification = array(
            'messege' => 'Product Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        $notification = array(
            'messege' => 'Product Delete!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function edit($id){
        $categories = Category::where('status' , '1')->get();
        $products = Product::where('id', $id)->get();
        
        $products=Product::find($id);
        return view('admin.product.edit' , compact('products','categories'));
    }

    public function update(Request $request ,$id)
    {
         
        $products= Product::find($id);
        $products->category_id=$request->category_id;
        $products->name=$request->name;
        $products->price=$request->price;
        $products->stock=$request->stock;
        $products->alert=$request->alert;
        $products->code=$request->code;
        $products->image=$request->image;
        $products->unit=$request->unit;
        $products->description=$request->description;
        $products->save();

       
       

        $notification = array(
            'messege' => 'Product Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('product.index')->with($notification);
    }

}
