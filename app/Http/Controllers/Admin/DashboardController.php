<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KecelakaanKerja;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // Statistik Ringkasan
        // =========================
        $laporanMingguIni = KecelakaanKerja::whereBetween('tanggal', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $laporanBulanIni = KecelakaanKerja::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->count();

        $laporanTahunIni = KecelakaanKerja::whereYear('tanggal', Carbon::now()->year)
            ->count();

        $totalLaporan = KecelakaanKerja::count();

        $laporanTerbaru = KecelakaanKerja::orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        // =========================
        // Grafik Berdasarkan Lokasi
        // =========================
        $laporanPerLokasi = KecelakaanKerja::select('lokasi', DB::raw('COUNT(*) as total'))
            ->groupBy('lokasi')
            ->get();

        $lokasiLabels = $laporanPerLokasi->pluck('lokasi');
        $lokasiTotals = $laporanPerLokasi->pluck('total');

        return view('admin.dashboard', compact(
            'laporanMingguIni',
            'laporanBulanIni',
            'laporanTahunIni',
            'totalLaporan',
            'laporanTerbaru',
            'lokasiLabels',
            'lokasiTotals'
        ));
    }
}