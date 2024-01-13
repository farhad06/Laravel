<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\students;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\mymail;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

date_default_timezone_set('Asia/Kolkata');

class ajaxController extends Controller
{

    public function index()
    {
        $data = students::all();
        return view('all')->with(['data' => $data]);
    }

    public function registration_form()
    {

        return view('student_registration');
    }

    public function register(Request $request)
    {
        //ssdd($request->all());
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:20|min:3',
            'mname' => 'nullable|string|max:20|min:3',
            'lname' => 'required|string|max:20|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()]);
        } else {

            $randomString = Str::random(60);

            $verify_link = url('/') . '/token-verify/' . $randomString;
            //dd($randomString);
            $name = $request->fname . " " . $request->mname . " " . $request->lname;

            $mailData = ['name' => $name, 'email' => $request->email, 'phone' => $request->phone, 'url' => $verify_link];

            $pdfData = ['name' => $name, 'email' => $request->email, 'phone' => $request->phone, 'title' => 'Sample PDF'];


            $pdf_name = time() . '.pdf';

            $pdf = PDF::loadView('pdf_file', ['data' => $pdfData]);


            #return $pdf->stream($pdf_name, array('Attachment' => 0));

            #$pdfLocation = public_path('storage/pdfs');

            #$pdf->save($pdfLocation,$pdf_name);
            $pdf->save(public_path("storage/pdfs/$pdf_name"));

            $enc_pass = Hash::make($request->password);

            $obj = new students();

            //return response("ok");
            $obj->fname = $request->fname;
            $obj->mname = $request->mname;
            $obj->lname = $request->lname;
            $obj->email = $request->email;
            $obj->phone = $request->phone;
            $obj->password = $enc_pass;
            $obj->token = $randomString;
            $obj->pdf = $pdf_name;

            $aff_row = $obj->save();

            if ($aff_row) {
                Mail::to($request->email)->send(new mymail($mailData));
                return response()->json(['success' => true, 'status' => 200,  'message' => "Successfully Saved Your data."]);
            } else {
                return response()->json(['success' => false, 'status' => 400, 'message' => "Data not Saved"]);
            }
        }
    }

    public function verify_token($token)
    {

        // echo $token;
        // die;
        $user_token = $token;
        //$data=students::all()->find($user_token);
        $data = students::all()->where('token', '=', $user_token)->first();

        if ($data == null) {
            //return "Invalid User";
            return redirect('registration')->with('err_message', "Link Expired");
        } else {
            #date_default_timezone_set('Asia/Kolkata');
            $currDateTime = date('Y-m-d h:i:s');
            $id = $data->id;
            //return "valid User";
            $updateData = ['verified' => 1, 'token' => null, 'verify_at' => $currDateTime];

            $update_row = students::where('id', '=', $id)->update($updateData);

            if ($update_row) {
                return redirect('registration')->with('success_message', "Successfully Verified Your Email");
            }
        }
    }

    /*public function get_students(){
        $data=students::all();

        return response()->json($data);
    }*/
}
