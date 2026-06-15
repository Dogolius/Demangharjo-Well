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
+            <div class="my-3 d-flex justify-content-center">
+                <img src="{{ asset('storage/' . $report->image) }}"
+                     alt="{{ $report->title }}"
+                     class="my-3"
+                     style="max-height:350px; max-width:100%; height:auto; width:auto; display:block;">
+            </div>
            @endif
            
            <h5>{{ $report->title }}</h5>
            <h6>by: {{ $report->reporter_name }}</h6>

            <article class="my-3 fs-5">
                <small>{!! $report->body !!}</small>  
            </article>
        </div>
    </div>
</div>
@endsection