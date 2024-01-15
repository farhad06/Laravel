<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show_people()
    {
        //$data = Person::all();
        $data = Person::paginate(10);

        return view('showpersondata',compact('data'));
    }
}
