@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <h1 class="mb-5 text-light text-center">Bilik Aduan</h1>
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-8 bg-light px-2 py-6 rounded">
                <form id="reportForm" action="/room" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="m-3">
                        <label for="title" class="form-label">Judul Aduan</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="image" class="form-label">Keterangan Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                        @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="body" class="form-label">Isi Aduan</label>
                        <input id="body" value="{{ old('body') }}" class="@error('body') is-invalid @enderror" type="hidden" name="body" required>
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                        <div class="invalid-feedback">
                          This field is required
                        </div> 
                        @enderror
                    </div>
                    {{-- <div class="mx-3 mb-3">
                        <button onclick="return confirm('Apa anda yakin untuk mengirim aduan?')" type="submit" class="btn btn-primary">Sampaikan Aduan</button>
                    </div> --}}
                    <div class="mx-3 mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmSubmitModal">
                            Sampaikan Aduan
                        </button>
                    </div>

                  <!-- Confirmation modal (Bootstrap) -->
                    <div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-labelledby="confirmSubmitModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="confirmSubmitModalLabel">Konfirmasi Pengiriman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="mb-0">Pastikan semua informasi dan lampiran sudah benar. Lanjutkan mengirim aduan?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button id="confirmSubmitBtn" type="submit" class="btn btn-primary">Ya, Kirim Aduan</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- hidden real submit to trigger native validation -->
                    <button id="hiddenSubmitBtn" type="submit" style="display:none"></button>

                <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const btn = document.getElementById('confirmSubmitBtn');
                  const form = document.getElementById('reportForm');
                  const hidden = document.getElementById('hiddenSubmitBtn');
                  if (!btn || !form || !hidden) return;

                  btn.addEventListener('click', function () {
                    btn.disabled = true;
                    // sync Trix content if present
                    try {
                      const trix = document.querySelector('trix-editor');
                      if (trix) {
                        const inputId = trix.getAttribute('input');
                        const input = document.getElementById(inputId);
                        if (input) input.dispatchEvent(new Event('input', { bubbles: true }));
                      }
                    } catch (e) {}

                    // click hidden submit to trigger standard validation + submit
                    hidden.click();
                  });
                });
                </script>
                </form>
            </div>
        </div>
    </div>
@endsection