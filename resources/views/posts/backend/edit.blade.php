@extends('layouts.panel')

@section('title', 'Crear post')

@section('content')
    <div class="col-8">
        <div class="card my-4">
            <div class="card-header">
                Editar post
            </div>
            <div class="card-body py-5 px-5">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            - {{ $error }} <br />
                        @endforeach
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="title" class="form-label">Título *</label>
                        <input name="title" id="title" type="text" class="form-control" required autofocus value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="file" class="form-label">Imágen</label>
                        <input name="file" id="file" type="file" class="form-control" value="{{ old('image', $post->get_image) }}">
                        @error('file')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="body" class="form-label">Contenido *</label>
                        <textarea name="body" id="body" rows="6" class="form-control" required>{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="iframe" class="form-label">Contenido embebido</label>
                        <textarea name="iframe" id="iframe" class="form-control" >{{ old('iframe', $post->iframe) }}</textarea>
                        @error('iframe')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <div class="col-auto">
                            @csrf
                            @method('PUT')
                            <button id="update" name="update" type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>  
    </div>
     

@endsection