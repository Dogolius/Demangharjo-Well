@extends('layouts/main')
@section('container')
    <h1 class="text-center text-light mb-3">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}"> 
                @endif
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}"> 
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn text-light" style="background-color: darkblue" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>


    @if ($post->count())
        <div class="card mb-3">
            @if ($post[0]->image)
            <div style="max-height: 500px; overflow:hidden">
                <img src="{{ asset('storage/' . $post[0]->image) }}" class="card-img-top img-fluid my-3" alt="{{ $post[0]->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top" alt="{{ $post[0]->category->name }}">
            @endif
            <div class="card-body text-center">
            <h5 class="card-title"><a href="/post/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->title }}</a></h5>
            <p>By <a href="/blog?user=/{{ $post[0]->user->username }}" class="text-decoration-none">{{ $post[0]->user->name }}</a> in <a href="/blog?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a>
            {{ $post[0]->created_at->diffForHumans() }}</p>
            <p class="card-text">{{ $post[0]->excerpt }}</p>
            <a href="/post/{{ $post[0]->slug }} "class="text-decoration-none btn btn-primary">Read more...</a>
            </div>
        </div>
    
    
    <div class="container">
        <div class="row">
            @foreach ($post->skip(1) as $postingan)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute bg-dark px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.5)"><a href="/blog?category={{ $postingan->category->slug }}" class="text-decoration-none text-white">{{ $postingan->category->name }}</a></div>
                        @if ($postingan->image)
                            <div style="max-height: 500px; overflow:hidden">
                                <img src="{{ asset('storage/' . $postingan->image) }}" class="card-img-top img-fluid my-3" alt="{{ $postingan->category->name }}">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/600x400?{{ $postingan->category->name }}" class="card-img-top" alt="{{ $postingan->category->name }}">
                        @endif
                        <div class="card-body">
                        <h5 class="card-title">{{ $postingan->title }}</h5>
                        <p>By <a href="/blog?user={{ $postingan->user->username }}" class="text-decoration-none">{{ $postingan->user->name }}</a>
                            {{ $postingan->created_at->diffForHumans() }}</p>
                        <p class="card-text">{{ $postingan->excerpt }}</p>
                        <a href="/post/{{ $postingan->slug }}" class="btn btn-primary">Read more..</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-center fs-4">No posts found.</p>
    @endif
    {{ $post->links() }}
@endsection

