@extends('layouts/main')

@section('container')
    <h1 class="text-center text-light mb-3">{{ $title }}</h1>
    <img src="{{ asset('storage/' . $document->visi) }}" width="100%" alt="">
@endsection