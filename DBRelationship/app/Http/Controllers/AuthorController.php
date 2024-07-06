<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function add_author()
    {
        $author = new Author();

        $author->username = "KL Rahul";
        $author->password = "12345tr";

        $author->save();

        return "Saved Successfully";
    }
}
