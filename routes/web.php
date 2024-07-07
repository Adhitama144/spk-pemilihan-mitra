<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProsesController;
use App\Models\Kriteria;
use App\Models\Mitra;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);

Route::middleware('guest')->group(function (){
    Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
    Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/perhitungan', PerhitunganController::class)->middleware(['auth']);

Route::get('/kriteria', function () {
    $kriterias = Kriteria::all();

    return view('kriteria.index', compact('kriterias'));
})->middleware(['auth'])->name('kriteria');

Route::resource('/daftar-mitra', MitraController::class)->middleware(['auth']);
Route::resource('/proses', ProsesController::class)->middleware(['auth']);
Route::get('/daftar-mitra', [MitraController::class, 'index'])->middleware(['auth'])->name('daftar-mitra.index');
Route::post('/daftar-mitra', [MitraController::class, 'store'])->middleware(['auth'])->name('daftar-mitra.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
