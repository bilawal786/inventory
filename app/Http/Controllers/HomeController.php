<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apperance;
use App\Lead;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $new=Lead::where('status' , '1')->count();
        $c_back=Lead::where('status' , '2')->count();
        $no_answer=Lead::where('status' , '3')->count();
        $new_answer=Lead::where('status' , '4')->count();
        $done=Lead::where('status' , '5')->count();
        $done_money=Lead::where('status' , '6')->count();
        $n_intrested=Lead::where('status' , '7')->count();
        $w_answer=Lead::where('status' , '8')->count();
        $try=Lead::where('status' , '9')->count();
        return view('admin.index' , compact('new' , 'c_back' , 'no_answer' ,'new_answer' ,'done' , 'done_money' , 'n_intrested' , 'w_answer' , 'try'));
    }

     public function apperance()
    {
        $app= Apperance::first();
        return view('admin.setting.apperance' , compact('app'));
    }
    public function app_update(Request $request) {

        $app = Apperance::first();
        $app->name = $request->name;
        if($request->hasfile('image'))
                  {
                    if(!empty($app->image)){
                        $image_path=$request->image;
                        unlink($image_path);
                      }
                        $image = $request->file('image');
                        $name = time().'app'.'.'.$image->getClientOriginalExtension();
                        $destinationPath ='profile_images/';
                        $image->move($destinationPath, $name);
                        $app->logo='profile_images/'.$name;

                         }

                    $app->save();
                     $notification=array(
                        'messege'=>'Apperance Updated Successfully!',
                        'alert-type'=>'success'
                         );
      return Redirect()->back()->with($notification);
    }
}
