<?php

namespace App\Http\Controllers;
use App\User;
use App\Currency;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $currency = Currency::where('status', 2)->get();
        $data = count($currency)>0?Currency::where('status', 2)->first(): Currency::where('status', 0)->first();
       
        
         return view('product', compact('data')); 
        
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if(!empty($id))
        {
         $data = Currency::where('code', $id)->first();   
        }else{
           $currency = Currency::where('status', 2)->get();
        $data = count($currency)>0?Currency::where('status', 2)->first(): Currency::where('status', 0)->first();
       
        }
         return view('product', compact('data')); 
    }

    public function profile($user_id){
        $user = User::find($user_id);
        return view('profile',compact('user'));
    }
}
