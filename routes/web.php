<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kecelakaanKerjaController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\LandingKecelakaanController;
use App\Http\Controllers\AdminKecelakaanController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\KecelakaanKerja;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/kecelakaanKerja/report/monthly',
        [ReportController::class, 'monthly']
    )->name('kecelakaanKerja.report.monthly');

    Route::get('/kecelakaanKerja/report/yearly',
        [ReportController::class, 'yearly']
    )->name('kecelakaanKerja.report.yearly');

    Route::get('/kecelakaanKerja/report/single/{id}',
        [ReportController::class, 'single']
    )->name('kecelakaanKerja.report.single');

    Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/kecelakaanKerja/image/{id}',
        [kecelakaanKerjaController::class, 'showImage']
    )->name('kecelakaanKerja.image');});


});

/*
|--------------------------------------------------------------------------
| 1. LANDING PAGE ROUTES (PUBLIC / USER)
|--------------------------------------------------------------------------
*/

// Halaman Home (Menampilkan Produk Dinamis dari DB)
Route::get('/', function () {
    $kerja = KecelakaanKerja::latest()->get();
    return view('landing.index', compact('kerja'));
})->name('home');

// Halaman Statis Lainnya
Route::get('/about', function () {
    return view('landing.about');
})->name('about');

Route::get('/kecelakaan-kerja', function () {
    $kerja = KecelakaanKerja::latest()->get(); // Ambil data dulu
    return view('landing.kecelakaanKerja', compact('kerja')); // Kirim ke view
})->name('kecelakaanKerja');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');

Route::get('/404', function () {
    return view('landing.404');
})->name('not-found');

Route::get('/kecelakaan-kerja/{id}', [LandingKecelakaanController::class, 'show'])
    ->name('kecelakaan.detail');




/*
|--------------------------------------------------------------------------
| 2. ADMIN ROUTES (BACKEND)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {


    Route::get('/index', function () {
        return view('admin.index');
    })->name('admin.product');

    Route::get('/kecelakaan-kerja', [kecelakaanKerjaController::class, 'index'])->name('admin.kecelakaanKerja');
    Route::post('/kecelakaan-kerja', [kecelakaanKerjaController::class, 'store'])->name('admin.kecelakaanKerja.store');
    Route::put('/kecelakaan-kerja/{id}', [kecelakaanKerjaController::class, 'update'])->name('admin.kecelakaanKerja.update');
    Route::delete('/kecelakaan-kerja/{id}', [kecelakaanKerjaController::class, 'destroy'])->name('admin.kecelakaanKerja.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');

    //Login dan Logout
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');

    Route::get('/admin/logout', function () {
        return redirect()->route('home');
    })->name('admin.logout');

    Route::get('/admin/kecelakaan/{id}', [AdminKecelakaanController::class, 'show'])
    ->name('admin.kecelakaan.detail');

    Route::middleware('auth')->group(function () {

    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])
        ->name('admin.profile.edit');

    Route::post('/admin/profile', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');
        

});



Route::get('/admin/search', [App\Http\Controllers\Admin\AdminSearchController::class, 'search'])
    ->name('admin.search');

    


});