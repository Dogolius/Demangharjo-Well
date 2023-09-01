@extends('layouts/main')

@section('container')
    <h1 class="text-center text-light mb-3">{{ $title }}</h1>
    <img src="{{ asset('storage/' . $document->struktur) }}" width="100%" alt="">
@endsection