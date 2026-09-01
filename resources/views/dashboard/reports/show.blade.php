@extends('dashboard.layouts.main')

@section('container')
<div class="container print-area">
    <div class="row my-3">
        <div class="col-lg-8">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3 no-print">
                <a href="/dashboard/reports" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Reports</a>
                <button type="button" class="btn btn-primary" onclick="window.print()"><span data-feather="printer"></span> Print</button>
                <form action="/dashboard/reports/{{ $report->id }}" class="d-inline" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span> Delete</button>
                </form>
            </div>

            @if ($report->image)
            <div class="my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/' . $report->image) }}"
                     alt="{{ $report->title }}"
                     class="my-3"
                     style="max-height:350px; max-width:100%; height:auto; width:auto; display:block;">
            </div>
            @endif

            <div class="border rounded p-4 bg-white text-dark">
                <h5 class="fw-bold mb-3">{{ $report->title }}</h5>
                <h6 class="mb-4">by: {{ $report->reporter_name }}</h6>

                <article class="my-3 fs-5">
                    <small>{!! $report->body !!}</small>
                </article>

                @auth
                    @if ($report->response)
                        <div class="alert alert-secondary my-3">
                            <h6 class="mb-2">Tanggapan Admin</h6>
                            <p class="mb-0">{!! nl2br(e($report->response)) !!}</p>
                        </div>
                    @else
                        <div class="alert alert-warning my-3">
                            <small class="mb-0">Belum ada tanggapan dari admin.</small>
                        </div>
                    @endif
                @endauth
            </div>

            @if (auth()->user() && auth()->user()->username === 'admin')
                <form action="/dashboard/reports/{{ $report->id }}" method="POST" class="my-3 no-print">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="response" class="form-label">Tulis Tanggapan</label>
                        <textarea name="response" id="response" class="form-control" rows="4">{{ old('response', $report->response) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Tanggapan</button>
                </form>
            @endif
        </div>
    </div>
</div>

<style>
    @media print {
        body {
            background: #fff !important;
        }

        .no-print,
        .sidebar,
        .navbar,
        footer,
        .btn,
        form:not(.keep-print) {
            display: none !important;
        }

        .container {
            max-width: 100% !important;
            width: 100% !important;
            padding: 0 !important;
        }

        .print-area {
            margin-top: 0 !important;
            padding: 0 !important;
        }

        .border.rounded {
            border: 0 !important;
            box-shadow: none !important;
            padding: 0 !important;
        }
    }
</style>
@endsection