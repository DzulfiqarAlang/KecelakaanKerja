<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KecelakaanKerja;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /* =========================================
       🔐 FUNCTION GLOBAL DECRYPT AES-256-CBC
    ========================================= */
    private function decryptToBase64($path)
    {
        if (!$path || !Storage::disk('public')->exists($path)) {
            return null;
        }

        $encrypted = Storage::disk('public')->get($path);

        $key = hash('sha256', env('AES_SECRET_KEY'));
        $iv = substr($encrypted, 0, 16);
        $ciphertext = substr($encrypted, 16);

        $decrypted = openssl_decrypt(
            $ciphertext,
            'AES-256-CBC',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );

        if (!$decrypted) {
            return null;
        }

        $finfo = finfo_open();
        $mime = finfo_buffer($finfo, $decrypted, FILEINFO_MIME_TYPE);
        finfo_close($finfo);

        return 'data:' . $mime . ';base64,' . base64_encode($decrypted);
    }

    /* =========================================
       📄 LAPORAN SATUAN
    ========================================= */
    public function single($id)
    {
        $kerja = KecelakaanKerja::findOrFail($id);

        $fotoBase64 = $this->decryptToBase64($kerja->foto);

        $pdf = Pdf::loadView(
            'admin.reports.kecelakaan-kerja-single',
            compact('kerja', 'fotoBase64')
        )->setPaper('A4', 'portrait');

        return $pdf->download('laporan-kecelakaan-kerja-'.$kerja->nama.'.pdf');
    }

    /* =========================================
       📅 LAPORAN BULANAN (BERDASARKAN TANGGAL KEJADIAN)
    ========================================= */
    public function monthly(Request $request)
    {
        $month = $request->month ?? date('m');
        $year  = $request->year ?? date('Y');

        // 🔥 PERBAIKAN DI SINI (pakai kolom tanggal)
        $kerjas = KecelakaanKerja::whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->get();

        foreach ($kerjas as $item) {
            $item->fotoBase64 = $this->decryptToBase64($item->foto);
        }

        $title = "Laporan Bulanan - " . date('F', mktime(0, 0, 0, $month, 10)) . " $year";

        $pdf = Pdf::loadView(
            'admin.reports.kecelakaan-kerja-monthly',
            compact('kerjas', 'month', 'year', 'title')
        )->setPaper('A4', 'landscape');

        return $pdf->download("laporan-kecelakaan-kerja-{$month}-{$year}.pdf");
    }

    /* =========================================
       📆 LAPORAN TAHUNAN (BERDASARKAN TANGGAL KEJADIAN)
    ========================================= */
    public function yearly(Request $request)
    {
        $year = $request->year ?? date('Y');

        // 🔥 PERBAIKAN DI SINI (pakai kolom tanggal)
        $kerjas = KecelakaanKerja::whereYear('tanggal', $year)->get();

        foreach ($kerjas as $item) {
            $item->fotoBase64 = $this->decryptToBase64($item->foto);
        }

        $title = "Laporan Tahunan - $year";

        $pdf = Pdf::loadView(
            'admin.reports.kecelakaan-kerja-yearly',
            compact('kerjas', 'year', 'title')
        )->setPaper('A4', 'landscape');

        return $pdf->download("laporan-kecelakaan-kerja-{$year}.pdf");
    }
}
