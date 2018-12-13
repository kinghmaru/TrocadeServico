<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $type = Auth::user()->type;
        

        if ($type == "2"){
            $usrs = DB::select('select * from users');
            return view('home_adm',['usrs' => $usrs]);
        }   
            $id = Auth::user()->id;
            $servs = DB::select('select * from servicos where id_usr ='.$id);
            return view('home',['servs' => $servs]);


    }
}
