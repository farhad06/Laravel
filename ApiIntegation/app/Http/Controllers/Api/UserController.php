<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $rules = [
            'name' => 'required|string|min:2|max:40',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:6',
            //'password_confirmation' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules); //bind this rules for all requested input 

        if ($validator->fails()) {
            return response()->json(['status' => false, 'error'=>$validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => "User Data Inserted Successfully",
            'user' => $user
        ]);
    }
}
