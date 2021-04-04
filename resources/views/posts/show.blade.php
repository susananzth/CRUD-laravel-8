@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="card mb-4">
        <div class="card-body">
            @if ($post->image)
                <img src="{{ $post->get_image }}" class="card-img-top">
            @endif
            
            @if ($post->iframe)
                <div class="card-img-top">
                    {!! $post->iframe !!}
                </div>
            @endif
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">
                {{ $post->body }}
            </p>
            <p class="text-dark-50 mb-0">
                <em>
                    &ndash; {{ $post->user->name }}
                </em>
                &ndash; {{  $post->created_at->format('d M Y') }}
            </p>
        </div>
    </div>  

@endsection
