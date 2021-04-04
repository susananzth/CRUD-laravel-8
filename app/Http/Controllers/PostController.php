<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.backend.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //Guardar
        $post = Post::create([
            // Con el user_id se guarda el usuario de quien esta logueado
            'user_id' => auth()->user()->id
        ] + $request->all()); //No usar $request->all() , mala practica

        //Imagen
        // Debido a que no es obligatoria, se pregunta si se recibe.
        if ($request->file('file')) {
            // Con esto, primero se guarda el archivo en la carpeta del proyecto con em metodo store()
            // y luego se guarda la ruta en la BD
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        //Retornar
        return back()->with('status', 'Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.backend.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        //Imagen
        // Debido a que no es obligatoria, se pregunta si existe.
        if ($request->file('file')) {
            // Con esto, primero se guarda el archivo en la carpeta del proyecto con em metodo store()
            // y luego elimina la anterior y se guarda la ruta de la nueva imagen.
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        //Retornar
        return back()->with('status', 'Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        // Eliminar imagen
        Storage::disk('public')->delete($post->image);
        // Eliminar post
        $post->delete();

        return back()->with('status', 'Eliminado con exito');
    }
}
