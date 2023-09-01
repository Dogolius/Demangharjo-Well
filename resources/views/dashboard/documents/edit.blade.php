@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="container">

            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-8 bg-light px-2 py-6 rounded">
                <form action="/dashboard/documents/{{ $document->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                    <div class="m-3">
                        <label for="realisasi" class="form-label">Gambar Realisasi</label>
                        <input class="form-control @error('realisasi') is-invalid @enderror" type="file" name="realisasi" id="realisasi">
                        @error('realisasi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="transparansi" class="form-label">Gambar Transparansi</label>
                        <input class="form-control @error('transparansi') is-invalid @enderror" type="file" name="transparansi" id="transparansi">
                        @error('transparansi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="struktur" class="form-label">Gambar Struktur</label>
                        <input class="form-control @error('struktur') is-invalid @enderror" type="file" name="struktur" id="struktur">
                        @error('struktur')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="visi" class="form-label">Gambar Visi</label>
                        <input class="form-control @error('visi') is-invalid @enderror" type="file" name="visi" id="visi">
                        @error('visi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="mx-3 mb-3">
                        <button onclick="return confirm('Apa anda yakin untuk update data?')" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
    </div>
@endsection