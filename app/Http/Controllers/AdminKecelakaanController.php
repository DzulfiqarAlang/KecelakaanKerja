<?php

namespace App\Http\Controllers;

use App\Models\Kecelakaan;
use App\Models\KecelakaanKerja;
use Illuminate\Http\Request;

class AdminKecelakaanController extends Controller
{
    // HALAMAN DETAIL KECELAKAANz
    public function show($id)
    {
        // ambil data berdasarkan id
        $kecelakaan = KecelakaanKerja::findOrFail($id);

        // kirim ke view detail
        return view('admin.kecelakaan.show', compact('kecelakaan'));
    }
}