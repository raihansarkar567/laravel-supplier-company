<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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
        $my_product_info=DB::table('tbl_suppliers')
        ->where('bus_id',Auth::user()->id)
        ->orderBy('product_id','desc')
        ->get();
        $manage_product=view('home')
        ->with('my_product', $my_product_info);
        return view('layouts.app')
        ->with('home',$manage_product);
        // return view('home');
    }

    public function sendToCompany($id){
        $product_info = DB::table('tbl_suppliers')
            ->where('product_id',$id)
            ->first();
        
            $data= array();
            $data['product_title']=$product_info->product_title;
            $data['product_des']=$product_info->product_des;
            $data['cost']=$product_info->cost;
            $data['bus_id']=$product_info->bus_id;
            DB::table('tbl_delivery')
                    ->insert($data);

        return redirect()->route('home');
    }
}
