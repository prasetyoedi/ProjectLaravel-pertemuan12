<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BukuController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/list_buku', [BukuController::class, 'list_buku']);
Route::get('/detail-buku/{id}', [BukuController::class, 'galbuku'])->name('buku.detail');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

    Route::middleware('admin')->group(function () {
        // Create Buku
        Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

        // Remove Buku
        Route::post('buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

        // Edit Buku
        Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::get('/buku', [BukuController::class, 'index']);
        Route::get('/buku/delete-gallery/{id}', [BukuController::class, 'deleteGalleryImage'])->name('deleteGalleryImage');
    });

});

//Search

require __DIR__ . '/auth.php';
