@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8 my-2" role="alert">
        {{ session('success') }}
        </div>
    @endif
    @if (session()->has('updateError'))
        <div class="alert alert-danger col-lg-8 my-2" role="alert">
        {{ session('updateError') }}
        </div>
    @endif
    @if (session()->has('duplicateError'))
        <div class="alert alert-danger col-lg-8 my-2" role="alert">
        {{ session('duplicateError') }}
        </div>
    @endif
    <div class="col-lg-8">
    <form action="/dashboard/password" method="POST">
    @method('put')
    @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Password Lama</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus >
            @error('password')
            <div class="invalid-feedback">
            {{ $message }}
            </div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="new" class="form-label">Password Baru</label>
            <input type="password" class="form-control @error('new') is-invalid @enderror" id="new" name="new" required >
            @error('new')
            <div class="invalid-feedback">
            {{ $message }}
            </div> 
            @enderror
        </div>
        <div class="mb-5">
            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </div>
    </form>
    </div>
@endsection