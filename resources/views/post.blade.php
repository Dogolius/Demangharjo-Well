@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-light rounded p-2">
                @if ($post->image)
                    <!-- Cover style for layout (fills area, keeps ratio) -->
                    <div class="post-image-wrapper mb-3 position-relative">
                        <div class="post-image-cover rounded"
                             style="background-image:url('{{ asset('storage/' . $post->image) }}'); background-size:cover; background-position:center; width:100%; height:350px;"></div>
                        <button type="button" class="btn btn-sm btn-secondary position-absolute" style="right:10px; bottom:10px;" data-bs-toggle="modal" data-bs-target="#imageModal">
                            Lihat penuh
                        </button>
                    </div>

                    <!-- Modal to show full image (contain) -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content bg-transparent border-0">
                                <div class="modal-body p-0 text-center">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="max-height:80vh; width:auto; display:inline-block;">
                                </div>
                            </div>
                        </div>
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