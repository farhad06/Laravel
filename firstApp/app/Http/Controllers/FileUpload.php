<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;



class FileUpload extends Controller
{
    public function form()
    {
        return view('register');
    }


    public function log_in_form()
    {
        return view('log_in_form');
    }

    public function login(Request $request)
    {
        #dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $email = trim($request->email);
        $password = trim($request->password);


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            #dd(Auth::user()->id);
            return redirect('show');
        } else {
            return redirect('/')->with('err_msg', 'Wrong Credential');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('succ_msg', 'Successfully Loggedout');
    }


    public function submit(Request $request)
    {
        //dd($request->all());
        /*$request->validate([
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'phone' => 'required|numeric|digits:10|unique:users',
            'password' => 'required|min:8',
            'image' => 'max:1000|mimes:jpeg,jpg,png,webp'
            //'pdf' => 'required|max:3000|mimes:pdf'

        ]);*/

        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'phone' => 'required|numeric|digits:10|unique:users',
            'password' => 'required|min:8',
            'image' => 'max:1000|mimes:jpeg,jpg,png,webp'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()]);
        } else {
            #code for image upload
            $image = $request->image;
            if (!($request->hasFile('image'))) {
                #return redirect('reg')->with('err_message', "Please Choose an Image.");
                $imageName = null;
            } else {
                $imageLocation = public_path('storage/imageABC');
                $imageName = "IMG_" . random_int(1000, 9999) . "." . $image->getClientOriginalExtension();
                $image->move($imageLocation, $imageName);
            }

            #code for encrypt password
            $enc_pass = Hash::make($request->password);

            $obj = new User();
            $obj->fname = $request->fname;
            $obj->mname = $request->mname;
            $obj->lname = $request->lname;
            $obj->email = $request->email;
            $obj->phone = $request->phone;
            $obj->image = $imageName;
            //$obj->pdf=$pdfName;
            $obj->password = $enc_pass;

            $aff_row = $obj->save();
            if ($aff_row) {
                #return redirect('reg')->with('message', "Successfully Saved Your Data");
                return response()->json(['success' => true, 'status' => 200, 'message' => "Successfully Saved Your Data"]);
            } else {
                return response()->json(['success' => false, 'status' => 400, 'message' => "Data not Saved"]);
            }
        }
        //}
        //}
    }

    public function show()
    {

        // if (empty(Auth::user()->id)) {
        //     return redirect('/');
        // } else {
        $user_role = Auth::user()->role;
        $user_id = Auth::user()->id;
        if ($user_role == 1) {
            $data = DB::table('users')->where('is_delete', 0)->get();
        } else if ($user_role == 0) {
            $data = DB::table('users')->where('is_delete', 0)->where('id', $user_id)->get();
        }
        return view('show-user')->with(['data' => $data]);
        //}
    }

    public function edit_user($id)
    {
        $data = User::find($id);
        return view('edit-user')->with(['data' => $data]);
        //return response()->json($data);
    }
    public function update_user(Request $request)
    {
        //dd($request->all());
        /*$request->validate([
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . $request->id,
            'image' => 'max:1000|mimes:jpeg,jpg,png,webp'
        ]);*/
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:users,email,' . $request->id, //users is the table name for particular data
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . $request->id,
            #'password' => 'required|min:8',
            'image' => 'max:1000|mimes:jpeg,jpg,png,webp'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()]);
        } else {
            $update_data = [
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone
            ];

            #code for image upload
            $image = $request->image;
            if ($request->hasFile('image')) {

                $oldImage = File::find($request->id);
                $oldImagePath = public_path('storage/imageABC/' . $oldImage->image);
                #dd($oldImagePath);

                $imageLocation = public_path('storage/imageABC');
                $imageName = time() . '_' . rand(1000, 9999) . "." . $image->getClientOriginalExtension();
                $image->move($imageLocation, $imageName);

                $update_data['image'] = $imageName;
                if (file_exists($oldImagePath) && !empty($oldImage->image)) {
                    unlink($oldImagePath);
                }
            }

            #dd($update_data);
            $aff_row = User::whereId($request->id)->update($update_data);

            if ($aff_row) {
                #$request->session()->flash('message', 'Successfully Updated Your Data');
                Session::flash('success', 'Successfully Updated Your Data');
                return response()->json(['success' => true, 'status' => 200, 'message' => "Successfully Update Your Data"]);

                #return redirect('show')->with('message', "Successfully Updated Your Data");
            } else {
                return response()->json(['success' => false, 'status' => 400, 'message' => "Data not Updated"]);
            }
        }
    }

    public function delete_user($id)
    {
        //dd($id);
        $delete_data = user::find($id);
        #dd($delete_data);
        $aff_row = $delete_data->delete();

        if ($aff_row) {
            #$update_status = ['is_delete' => 1];
            DB::table('users')->where('id', $id)->update(['is_delete' => 1]);
            #dd($data);
            return redirect('show')->with('success', "Data Deleted Successfully");
        } else {
            return redirect('show')->with('err_msg', "Data Not Deleted");
        }
    }

    public function submit_modal_data(Request $request)
    {
        //dd($request->all());
        if ($request->edit == 'true' && $request->delete == 'true' && $request->register == 'true') {
            $update_data = ['edit' => 1, 'delete_data' => 1, 'register' => 1];
        } else if ($request->edit == 'true' && $request->delete == 'true') {
            $update_data = ['edit' => 1, 'delete_data' => 1, 'register' => 0];
        } else if ($request->edit == 'true' && $request->register == 'true') {
            $update_data = ['edit' => 1, 'delete_data' => 0, 'register' => 1];
        } else if ($request->delete == 'true' && $request->register == 'true') {
            $update_data = ['edit' => 0, 'delete_data' => 1, 'register' => 1];
        } else if ($request->edit == 'true') {
            $update_data = ['edit' => 1, 'delete_data' => 0, 'register' => 0];
        } else if ($request->delete == 'true') {
            $update_data = ['edit' => 0, 'delete_data' => 1, 'register' => 0];
        } else if ($request->register == 'true') {
            $update_data = ['edit' => 0, 'delete_data' => 0, 'register' => 1];
        }
        $aff_row = DB::table('users')->update($update_data);
        if($aff_row){
            return redirect('show');
        }
    }
}
