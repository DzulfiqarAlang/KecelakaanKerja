<?php

namespace App\Http\Controllers;

use App\Models\KecelakaanKerja;

class LandingKecelakaanController extends Controller
{
    public function show($id)
    {
        $data = KecelakaanKerja::findOrFail($id);

        return view('landing.detail-kecelakaan', compact('data'));
    }
}
