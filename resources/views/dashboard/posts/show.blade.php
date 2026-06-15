@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to My Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit-2"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span> Delete</button>
            </form>

            @if ($post->image)
            <div class="my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/' . $post->image) }}"
                     alt="{{ $post->title }}"
                     class="my-3"
                     style="max-height:350px; max-width:100%; height:auto; width:auto; display:block;">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid my-3" alt="{{ $post->category->name }}">
            @endif
            
            <h5>{{ $post->title }}</h5>
            
            <article class="my-3 fs-5">
                <small>{!! $post->body !!}</small>  
            </article>
        </div>
    </div>
</div>
@endsection