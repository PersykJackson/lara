<?php

use Illuminate\Support\Facades\Route;

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
        Route::get('/', [\App\Http\Controllers\PhotoController::class, 'index'])->name('photos');
        Route::post('/', [\App\Http\Controllers\PhotoController::class, 'save'])->name('savePhoto');

        Route::view('/save', 'photos.save');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
