@extends('layouts/main')

@section('container')
    <h1 class="text-center text-light mb-3">{{ $title }}</h1>
    <div class="row">
        <div>
            <img src="{{ asset('storage/' . $document->transparansi) }}" width="100%" alt="">
        </div>
        <div>
            <img src="{{ asset('storage/' . $document->realisasi) }}" width="100%" alt="">
        </div>
    </div>
@endsection