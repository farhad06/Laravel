<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add_post($id)
    {
        $author = Author::find($id);
        $post = new Post();

        $post->title = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
        $post->cat = "Javascript";

        $author->post()->save($post);

        return "Post Saved Successfully";
    }

    public function show_post($id)
    {
        $data = Author::find($id)->post;
        return $data;
    }

    public function show_author($id)
    {
        $data = Post::find($id)->author;
        return $data;
    }
}
