<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::prefix('photos')->group(function () {
        Route::get('/', [PhotoController::class, 'index'])->name('photos');
        Route::post('/', [PhotoController::class, 'save'])->name('savePhoto');

        Route::view('/save', 'photos.save');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', fn () => redirect('admin/info'));

        Route::get('/{tab}', [AdminController::class, 'index']);
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
