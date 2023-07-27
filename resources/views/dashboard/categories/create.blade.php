@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create a category</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" required>
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
        </form>
    </div>

    {{-- <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function(){
                fetch('/dashboard/posts/checkSlug?name=' + name.value)
            .then((response) => response.json())
            .then((data) => slug.value = data.slug);
        })
    </script> --}}
    <script>
        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        name.addEventListener("keyup", function() {
            let preslug = name.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });
    </script>
    
@endsection