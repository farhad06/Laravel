<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    public function index(){
        return view('registration');
    }

    public function add(Request $req){
        //dd($req->all());
        $req->validate([
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'phone'=>'required|numeric|digits:10',
            'email'=>'email:rfc,dns',
            'psw'=>'required|min:8'

        ]);
        $enc_pass=password_hash($req->psw,PASSWORD_DEFAULT);
        $aff=DB::table('users')->insert([
            'fname'=>$req->fname,
            'mname'=>$req->mname,
            'lname'=>$req->lname,
            'fname'=>$req->fname,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'password'=>$enc_pass
        ]);


        if($aff){
            //echo "Data Submitted";
            return redirect('/showuser');
        }else{
            //echo "Data not  Submitted";
            return redirect('/showuser');
        }
    }

    public function show_users(){
        $data=DB::table('users')->get();
        //dd($data);

        return view('show')->with(['data'=>$data]);
    }
}
