@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-light rounded p-2">
                @if ($post->image)
                    <div style="max-height: 500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid my-3" alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid my-3" alt="{{ $post->category->name }}">
                @endif
                <h5 class="my-3">{{ $post->title }}</h5>
                <p>By <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                
                <br>
                <a href="/blog" class="btn text-light" style="background-color: darkblue">Kembali ke blog</a>
            </div>
        </div>
    </div>
@endsection