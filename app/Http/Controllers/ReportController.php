<?php

namespace App\Http\Controllers;

use App\Categor;
use App\Expences;
use App\Income;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $expencerp=Categor::where('types','expence')->get();
        $inccategory=Categor::where('types','income')->get();
        $totalexpence=Expences::sum('price');
        $totalincome=Income::sum('price');
        return view('admin.report.index',compact('expencerp','inccategory','totalexpence','totalincome'));
    }
    public function search(Request $request){
        $month = date('m',strtotime($request->month));
        $year = date('Y',strtotime($request->month));
        $search = Expences::whereMonth('date',$month)->whereYear('date',$year)->get();
        $search2=Income::whereMonth('date',$month)->whereYear('date',$year)->get();
        $totalexpence = Expences::whereMonth('date',$month)->whereYear('date',$year)->sum('price');
        $totalincome=Income::whereMonth('date',$month)->whereYear('date',$year)->sum('price');
        return view('admin.report.search',compact('search','search2' ,'totalexpence','totalincome'));
    }
}
