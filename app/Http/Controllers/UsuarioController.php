<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function edit($id)
    {

        $type = Auth::user()->type;

        if ($type == "2"){
            $usrs = DB::select('select * from users');
            return view('home_adm',['usrs' => $usrs]);
        }



        $res = DB::table('users')
            ->where('id',$id)
            ->first();


        if (isset($res)){
            return view('usrs.edit',['usrs' => $res]);
        }

        return redirect()->to (route('home'));  
    }



    public function update(Request $request, $id)
    {
        $type = Auth::user()->type;

        if ($type == "2"){
            $usrs = DB::select('select * from users');
            return view('home_adm',['usrs' => $usrs]);
        }



        $nome = Input::get('name');
        $email = Input::get('email');

        DB::table('users')
            ->where('id',$id)
            ->update(['name' => $nome,
            'email' => $email]);

        return redirect()->to (route('home'));

    }



    public function destroy($id)
    {
        $type = Auth::user()->type;

        if ($type == "1"){
            $usrs = DB::select('select * from users');
            return view('home',['usrs' => $usrs]);
        }

        $res = DB::table('users')
            ->where('id',$id)
            ->delete();

            $usrs = DB::select('select * from users');
            return view('home_adm',['usrs' => $usrs]);
    }
}
