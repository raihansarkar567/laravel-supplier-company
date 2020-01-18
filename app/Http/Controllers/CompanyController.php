<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $delivery_info = DB::table('tbl_delivery')
            ->get();
        $store_info = DB::table('tbl_store')
            ->get();
        return view('company', ['delivery_info' => $delivery_info, 'store_info' => $store_info]);
        // return view('company');
    }

    public function companyStore($id)
    {
        $delivery_info = DB::table('tbl_delivery')
            ->where('delivery_id',$id)
            ->first();

        $data= array();
        $data['product_title']=$delivery_info -> product_title;
        $data['product_des']=$delivery_info -> product_des;
        $data['cost']=$delivery_info -> cost;
        $data['bus_id']=$delivery_info -> bus_id;
        DB::table('tbl_store')
                    ->insert($data);

        DB::table('tbl_delivery')
                    ->where('delivery_id',$id)
                    ->delete();

        return redirect()->route('company.dashboard');
    }

    public function deleteFromStore($id)
    {
        DB::table('tbl_store')
                    ->where('store_id',$id)
                    ->delete();

        return redirect()->route('company.dashboard');
    }
}
