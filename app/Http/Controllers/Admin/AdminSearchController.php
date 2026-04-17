<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KecelakaanKerja;

class AdminSearchController extends Controller
{
    public function search(Request $request)
{
    $keyword = $request->q;

    $results = KecelakaanKerja::where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                ->orWhere('lokasi', 'like', '%' . $keyword . '%')
                ->get();

    return view('admin.search_result', compact('results', 'keyword'));
}
}