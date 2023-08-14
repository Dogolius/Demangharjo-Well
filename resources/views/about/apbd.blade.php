@extends('layouts/main')

@section('container')
    <h1 class="text-center text-light mb-3">{{ $title }}</h1>
    <div class="row">
        <div>
            <img style="object-fit: contain" src="/img/infografis_apbd.jpg" alt="" width="100%" srcset="" class="mx-auto d-block">
        </div>
        <div>
            <img style="object-fit: contain" src="/img/realisasi_apbd.jpg" alt="" width="100%" srcset="" class="mx-auto d-block">
        </div>
    </div>
@endsection