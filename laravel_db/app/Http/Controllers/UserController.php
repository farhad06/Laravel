<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function showUsers(){
        $users=DB::table('users')->get();
        //return $users;
        //dd($users);

        return view('alluser', ['data' => $users]); //['data'=>$users]
    }

    public function showSingleUser(String $id){
        $user=DB::table('users')->where('id',$id)->get();

        return view('singleUser',['data'=>$user]);
    }

    public function addUser(Request $req){

        $user=DB::table('users')

                ->insert([
                    'name'=>$req->name,
                    'email'=>$req->email,
                    'age'=>$req->age,
                    'city'=>$req->city
                ]);
        

                if($user){
                    return redirect()->route('home');
                }else{
                    echo "<h2>Data not Added</h2>";

                }
    }

    public function updatePage(String $id){
        $user=DB::table('users')->find($id);
        
        return view('updateuser',['data'=>$user]);
    }

    public function updateUser(Request $req,String $id){
        //return $req;
        $user = DB::table('users')
                    ->where('id',$id)
                    ->update([
                        'name' => $req->name,
                        'email' => $req->email,
                        'age' => $req->age,
                        'city' => $req->city
                    ]);
        //dd($user);

        if ($user) {
            return redirect()->route('home');
        } else {
            echo "<h2>Data not Added</h2>";
        }

    }

    public function deleteUser(String $id){
        $res=DB::table('users')->where('id',$id)->delete();

        if($res){
            //echo "<h2>Data Deleted</h2>";
            return redirect()->route('home');
        
        }else{
            echo "<h2>Data Not deleted</h2>";

        }
    }
}
