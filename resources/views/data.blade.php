@extends('layouts/main')
@section('container')
    <div class="container py-4 text-white print-content" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
            <h1 class="mb-0 text-center flex-fill">Data Demangharjo</h1>
            <button type="button" class="btn btn-primary" onclick="window.print()">
                <span class="bi bi-printer me-2"></span>Print PDF
            </button>
        </div>

        <h1 class="mb-4 text-center d-none d-print-block print-only-title">Data Demangharjo</h1>

        <div class="row g-4 mb-4 summary-row">
            <div class="col-md-4 summary-item">
                <div class="card text-bg-dark border-secondary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="card-title text-secondary mb-0">Total Aduan</h5>
                        <p class="display-6 fw-bold mb-0">{{ $totalReports }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 summary-item">
                <div class="card text-bg-dark border-secondary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="card-title text-success mb-0">Sudah Ada Respons</h5>
                        <p class="display-6 fw-bold mb-0">{{ $respondedReports }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 summary-item">
                <div class="card text-bg-dark border-secondary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="card-title text-warning mb-0">Persentase Respons</h5>
                        <p class="display-6 fw-bold mb-0">{{ $responsePercentage }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="card text-bg-dark border-secondary h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="mb-3 text-center">Distribusi Aduan</h4>
                        <div style="position: relative; height: 300px; width: 100%;">
                            <canvas id="reportChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card text-bg-dark border-secondary h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="mb-3 text-center">Keaktifan Posting per Bulan</h4>
                        <div style="position: relative; height: 300px; width: 100%;">
                            <canvas id="postChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const reportChart = new Chart(document.getElementById('reportChart'), {
            type: 'doughnut',
            data: {
                labels: ['Sudah Ada Respons', 'Belum Ada Respons'],
                datasets: [{
                    data: [{{ $respondedReports }}, {{ $pendingReports }}],
                    backgroundColor: ['#198754', '#ffc107'],
                    borderColor: '#212529',
                    borderWidth: 2,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '60%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#fff',
                            boxWidth: 12,
                            padding: 16,
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.parsed} aduan`;
                            }
                        }
                    }
                },
                animation: false
            }
        });

        const postChart = new Chart(document.getElementById('postChart'), {
            type: 'bar',
            data: {
                labels: @json($postMonthLabels),
                datasets: [{
                    label: 'Jumlah Post',
                    data: @json($postMonthData),
                    backgroundColor: '#0d6efd',
                    borderColor: '#0b5ed7',
                    borderWidth: 1,
                    borderRadius: 6,
                    maxBarThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#fff',
                            maxRotation: 45,
                            minRotation: 0,
                            autoSkip: false
                        },
                        grid: { color: 'rgba(255,255,255,0.08)' }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#fff',
                            precision: 0,
                            stepSize: 1
                        },
                        grid: { color: 'rgba(255,255,255,0.08)' }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                animation: false
            }
        });

        const resetChartPalette = () => {
            reportChart.options.plugins.legend.labels.color = '#fff';
            postChart.options.scales.x.ticks.color = '#fff';
            postChart.options.scales.y.ticks.color = '#fff';
            postChart.options.scales.x.grid.color = 'rgba(255,255,255,0.08)';
            postChart.options.scales.y.grid.color = 'rgba(255,255,255,0.08)';

            reportChart.update();
            postChart.update();
        };

        window.addEventListener('beforeprint', function () {
            reportChart.options.plugins.legend.labels.color = '#111827';
            postChart.options.scales.x.ticks.color = '#111827';
            postChart.options.scales.y.ticks.color = '#111827';
            postChart.options.scales.x.grid.color = 'rgba(17, 24, 39, 0.15)';
            postChart.options.scales.y.grid.color = 'rgba(17, 24, 39, 0.15)';

            reportChart.update();
            postChart.update();
        });

        window.addEventListener('afterprint', resetChartPalette);
    </script>

    <style>
        @media print {
            body {
                background: #fff !important;
            }

            .no-print,
            .navbar,
            .ticker,
            footer,
            .footer,
            .container > .d-flex,
            .d-print-none {
                display: none !important;
            }

            .print-content {
                color: #000 !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .card {
                background: #fff !important;
                border: 1px solid #d0d7de !important;
                color: #000 !important;
                box-shadow: none !important;
                break-inside: avoid;
            }

            .card-body,
            .card-title,
            h1,
            h4,
            h5,
            p {
                color: #000 !important;
            }

            canvas {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .chartjs-render-monitor canvas,
            canvas {
                filter: none !important;
            }

            .chartjs-render-monitor {
                color: #111827 !important;
            }

            .summary-row {
                display: flex !important;
                flex-wrap: nowrap !important;
                gap: 0.75rem !important;
            }

            .summary-item {
                flex: 1 1 0 !important;
                max-width: 33.333% !important;
            }

            .print-only-title {
                display: block !important;
                color: #000 !important;
                margin-bottom: 1.5rem !important;
            }

            canvas {
                max-width: 100% !important;
                height: auto !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .chartjs-render-monitor {
                width: 100% !important;
                height: 300px !important;
            }

            .chartjs-size-monitor,
            .chartjs-size-monitor-expand,
            .chartjs-size-monitor-shrink {
                display: none !important;
            }
        }
    </style>
@endsection