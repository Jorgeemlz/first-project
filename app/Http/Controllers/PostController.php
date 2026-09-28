<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController 
{
public function index()
       
{
    $posts = Post::get();
     return view('blog', ['posts' => $posts]);
}
}