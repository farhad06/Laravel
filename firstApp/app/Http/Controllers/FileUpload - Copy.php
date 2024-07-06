<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

date_default_timezone_set('Asia/Kolkata');

class FileUpload extends Controller
{
    public function form()
    {
        return view('register');
    }



    public function submit(Request $request)
    {
        //dd($request->all());
        /*$request->validate([
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:files', //files is the table name for particular data
            'phone' => 'required|numeric|digits:10|unique:files',
            'password' => 'required|min:8',
            'image' => 'max:1000|mimes:jpeg,jpg,png,webp'
            //'pdf' => 'required|max:3000|mimes:pdf'

        ]);*/

        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:files', //files is the table name for particular data
            'phone' => 'required|numeric|digits:10|unique:files',
            'password' => 'required|min:8',
            'image' => 'required|max:1000|mimes:jpeg,jpg,png,webp'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()]);
        } else {
            #code for image upload
            $image = $request->image;
            if (!($request->hasFile('image'))) {
                return redirect('reg')->with('err_message', "Please Choose an Image.");
            } else {
                $imageLocation = public_path('storage/imageABC');
                $imageName = "IMG_" . random_int(1000, 9999) . "." . $image->getClientOriginalExtension();
                $image->move($imageLocation, $imageName);
            }

            /*$user_email_exist = File::where('email', $request->email)->first();
        $user_phone_exist = File::where('phone', $request->phone)->first();
        if ($user_email_exist != null) {
            return redirect('reg')->with('err_message', "Email  already exists.");
        } else if ($user_phone_exist != null) {
            return redirect('reg')->with('err_message', "Phone Number already exists.");
        } else {*/
            #code for encrypt password
            $enc_pass = Hash::make($request->password);

            $obj = new File();
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
        $data = File::all();
        #dd($data);

        return view('show-user')->with(['data' => $data]);
    }

    public function edit_user($id)
    {
        $data = File::find($id);
        return view('edit-user')->with(['data' => $data]);
    }
    public function update_user(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:files,email,' . $request->id,
            'phone' => 'required|numeric|digits:10|unique:files,phone,' . $request->id,
            'image' => 'max:1000|mimes:jpeg,jpg,png,webp'
        ]);

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
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        #dd($update_data);
        $aff_row = File::whereId($request->id)->update($update_data);

        if ($aff_row) {

            return redirect('show')->with('message', "Successfully Updated Your Data");
        }
    }
}
