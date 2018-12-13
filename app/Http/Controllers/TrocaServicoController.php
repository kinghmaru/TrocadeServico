<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;

class TrocaServicoController extends Controller
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
        $servs = DB::select('select * from servicos');
        return view('troca.index',['servs' => $servs]);

    }



    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $serv_sol = Input::get('usrserv');
        $id_usr1 = $id; 
        $serv_dese = Input::get('idserv');


        $serve = DB::table('servicos')->where('nome', $serv_sol)->value('id');

        $id_u2 = DB::table('servicos')->where('id', $serv_dese)->value('id_usr');

        DB::insert('insert into troca_servicos (serv_sol,id_usr1,serv_dese,id_usr2) values (?,?,?,?)',[$serve,$id_usr1,$serv_dese,$id_u2]);

        return redirect()->to (route('home'));
    }

}
