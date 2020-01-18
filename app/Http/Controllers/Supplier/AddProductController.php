<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class AddProductController extends Controller
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
        return view('supplier.add_product');
        // return view('home');
    }
    public function submit_product(Request $request){
        $data= array();
        $data['product_title']=$request->product_title;
        $data['product_des']=$request->product_des;
        $data['cost']=$request->cost;
        $data['bus_id']=$request->bus_id;

        DB::table('tbl_suppliers')->insert($data);
        Session::put('product_message','Product added sucsessfully!!!');
        return Redirect::to('/home');
    }
}
