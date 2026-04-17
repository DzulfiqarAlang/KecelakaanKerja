@extends('admin.layouts.app')

@section('content')
    <div class="page-content">

        {{-- STATISTIC CARDS --}}
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card stat-card bg-gradient-primary text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 small">Laporan Minggu Ini</p>
                            <h2 class="fw-bold mb-0">{{ $laporanMingguIni }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="material-icons-outlined">date_range</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card bg-gradient-success text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 small">Laporan Bulan Ini</p>
                            <h2 class="fw-bold mb-0">{{ $laporanBulanIni }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="material-icons-outlined">calendar_month</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card bg-gradient-danger text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 small">Total Seluruh Laporan</p>
                            <h2 class="fw-bold mb-0">{{ $totalLaporan }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="material-icons-outlined">assessment</i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- CHART SECTION --}}
        <div class="row mt-4 g-4">

            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0">
                        <h6 class="fw-semibold mb-0">Statistik Laporan</h6>
                    </div>
                    <div class="card-body chart-container">
                        <canvas id="chartLaporan"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0">
                        <h6 class="fw-semibold mb-0">Berdasarkan Lokasi</h6>
                    </div>
                    <div class="card-body chart-container">
                        <canvas id="chartLokasi"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Chart 1
        new Chart(document.getElementById('chartLaporan'), {
            type: 'bar',
            data: {
                labels: ['Minggu Ini', 'Bulan Ini', 'Tahun Ini', 'Total'],
                datasets: [{
                    data: [
                        {{ $laporanMingguIni }},
                        {{ $laporanBulanIni }},
                        {{ $laporanTahunIni }},
                        {{ $totalLaporan }}
                    ],
                    backgroundColor: [
                        '#e60000',
                        '#b30000',
                        '#ff4d4d',
                        '#990000'
                    ],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0 }
                    }
                }
            }
        });

        // Chart 2
        new Chart(document.getElementById('chartLokasi'), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($lokasiLabels) !!},
                datasets: [{
                    data: {!! json_encode($lokasiTotals) !!},
                    backgroundColor: [
                        '#e60000',
                        '#b30000',
                        '#ff4d4d',
                        '#990000',
                        '#ff8080'
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { padding: 15 }
                    }
                }
            }
        });
    </script>
@endsection


@section('styles')
    <style>
        /* ===== Chart Container (samakan ukuran grafik) ===== */
        .chart-container {
            position: relative;
            height: 320px;
        }

        /* ===== Corporate Telkom Gradient Cards ===== */

        .bg-gradient-primary {
            background: linear-gradient(135deg, #e60000, #b30000);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #cc0000, #990000);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #ff1a1a, #b30000);
        }

        .stat-card,
        .stat-card * {
            color: #ffffff !important;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            font-size: 40px;
            opacity: 0.4;
        }

        .card {
            border-radius: 12px;
        }
    </style>
@endsection