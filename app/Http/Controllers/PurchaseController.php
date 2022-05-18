<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use App\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::where('status', '0')->get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create(){
        $suppliers = Supplier::where('status', '1')->get();
        $products = Product::where('status', '1')->get();
        return view('admin.purchase.create', compact('products', 'suppliers'));
    }
    public function store(Request $request){
        $purchase = new Purchase();
        $purchase->product_id = $request->product_id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchaseprice = $request->purchaseprice;
        $purchase->stock = $request->stock;
        $purchase->saleprice = $request->saleprice;
        $purchase->total = $request->total;
        $purchase->profit = $request->profit;
        $purchase->purchasestatus = $request->purchasestatus;
        $purchase->paymentstatus = $request->paymentstatus;
        $purchase->description = $request->description;

        $purchase->referenceno = '1-'.rand(10000000000,90000000000);
        $purchase->save();

        if ($request->purchasestatus == 'Received'){
            $product = $purchase->product;
            $totalStock = $product->stock + $request->stock;
            $product->update(['stock' => $totalStock]);
        }
        $notification = array(
            'messege' => 'Purchase Create Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $suppliers = Supplier::where('status', '1')->get();
        $products = Product::where('status', '1')->get();
        $purchase = Purchase::find($id);
        return view('admin.purchase.edit', compact('purchase', 'suppliers', 'products'));
    }
    public function update(Request $request, $id){
        $purchase = Purchase::find($id);
        $purchase->product_id = $request->product_id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchaseprice = $request->purchaseprice;
        $purchase->stock = $request->stock;
        $purchase->saleprice = $request->saleprice;
        $purchase->total = $request->total;
        $purchase->profit = $request->profit;
        $purchase->purchasestatus = $request->purchasestatus;
        $purchase->paymentstatus = $request->paymentstatus;
        $purchase->description = $request->description;

        $purchase->update();
        $product = $purchase->product;

        if ($request->purchasestatus == 'Received'){
            $totalStock = $product->stock + $request->stock;
            $product->update(['stock' => $totalStock]);
        }
        if ($request->purchasestatus == 'Orderd'){
            $totalStock = $product->stock - $request->stock;
            $product->update(['stock' => $totalStock]);
        }
        $product->update(['price' => $request->saleprice]);

        $notification = array(
            'messege' => 'Purchase Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('purchase.index')->with($notification);
    }
}
