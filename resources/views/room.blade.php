@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="/room" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Aduan</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Keterangan Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" required>
                        @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Isi Aduan</label>
                        <input id="body" value="{{ old('body') }}" class="@error('body') is-invalid @enderror" type="hidden" name="body" required>
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                        <div class="invalid-feedback">
                          This field is required
                        </div> 
                        @enderror
                    </div>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary">Sampaikan Aduan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection