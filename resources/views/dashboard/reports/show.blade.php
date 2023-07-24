@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/reports" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Reports</a>
            <form action="/dashboard/reports/{{ $report->id }}" class="d-inline" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span> Delete</button>
            </form>

            @if ($report->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/' . $report->image) }}" class="card-img-top img-fluid my-3" alt="{{ $report->title }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $report->title }}" class="card-img-top img-fluid my-3" alt="{{ $report->title }}">
            @endif
            
            <h5>{{ $report->title }}</h5>
            
            <article class="my-3 fs-5">
                <small>{!! $report->body !!}</small>  
            </article>
        </div>
    </div>
</div>
@endsection