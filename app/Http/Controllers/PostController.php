<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    public function index() //mostrar listado de post
    {
        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)  // mostrar el detalle de un post
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create() // devolver el formulario para crear post
    {
        return view('posts.create', ['post' => new Post]);
    }

    public function store(SavePostRequest $request) // para almacenar el post en la bd
    {
        Post::create($request->validated());

        

        return to_route('posts.index')->with('status','post created');
    }

    public function edit(Post $post)  // mostrar el formulario para editar el post
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post) //almacenar los cambios de un post en la bd
    {
        $post->update($request->validated());

      

        return to_route('posts.show', $post)->with('status','Post updated');
    }

    public function destroy(Post $post) // eliminar un post de la bd

    {
        $post->delete();

        return to_route('posts.index')->with('status','Post deleted');
    }

    public function __construct()

    {
       $this->middleware('auth')->except('index','show');
    }
}
