<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        return view('posts.index', [
            'posts' => Post::with('user')->latest()->paginate(5)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function post(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

}
