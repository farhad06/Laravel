<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function show()
    {
        return view('show_salary');
    }

    public function add_sal_form()
    {
        return view('add_salary');
    }

    public function submit_salary(Request $request){
        $aff=DB::table('salary')->insert(['name'=>$request->name,'salary'=>$request->salary]);
        if($aff){
            return redirect('show');
        }
    }
}
