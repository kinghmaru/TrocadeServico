<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;    
use DB;

class ServicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function store(Request $request)
    {
        $nome = Input::get('nome');

        $descricao = Input::get('desc'); 

        $id_usr = Auth::user()->id;

        DB::insert('insert into servicos (nome,descricao,id_usr) values (?,?,?)',[$nome,$descricao,$id_usr]);

        return redirect()->to(route('home'));
    }


    public function destroy($id)
    {
        $type = Auth::user()->type;

        if ($type == "2"){
            $usrs = DB::select('select * from users');
            return view('home_adm',['usrs' => $usrs]);
        }


        $res = DB::table('servicos')
            ->where('id',$id)
            ->delete();

            return redirect()->to (route('home'));

    }
}
