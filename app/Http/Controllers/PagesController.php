<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class PagesController extends Controller
{

public $title='';
public $heading="Welcome";

  public function index()
   {
     $title='Welcome to our Blog';
     //return view('pages.index',compact('title'));
     return view('pages.index')->with('title',$title);
   }
  
   public function about()
   {
     $title='About us';
     return view('pages.about')->with('title',$title);
   }
   public function service()
   {
    // $title='Services';
     $service=array('tytl'=>'Our Service','services'=>['php','Laravel','Codeigniter','yii']);
     return view('pages.service')->with($service);
   }
  

     public function dummy(Request $request)
   {
     if(!empty(request()->all()))
    {
         $sum= request()->a + request()->b ;
         return view('pages.test')->with('sum',$sum);
     }
     return view('pages.test');
       

   }
}
