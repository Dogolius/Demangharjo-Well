@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
          <h1 class="h3 mb-3 fw-normal text-center text-light">Please register</h1>
            <form action="/register" method="POST">
              @csrf
              <div class="d-flex justify-content-center">
                <img class="mb-4" src="/img/logo_tegal.png" alt="" width="170" height="136">
              </div>
          
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                <label for="name">Full Name</label>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required >
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register</button>
            </form>
            <a href="/login"><h6 class="mt-2 mb-3 fw-normal text-center text-light">Sudah punya akun</h6></a>
            <p class="mt-2 mb-2 text-muted">&copy; 2023</p>
        </main>
    </div>
</div>

@endsection