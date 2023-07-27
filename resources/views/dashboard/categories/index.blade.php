@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
          {{ session('success') }}
        </div>
      @endif
    <div class="table-responsive col-lg-10">
      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create a new category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="/blog?category={{ $category->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <form action="/dashboard/categories/{{ $category->id }}" class="d-inline" method="POST">
                      @csrf
                      @method('delete')
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>

@endsection