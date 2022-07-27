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
    Route::resource('photos', PhotoController::class)
        ->names(['index' => 'photos', 'store' => 'storePhoto']);

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/{tab}', [AdminController::class, 'show']);
        Route::put('/settings', [AdminController::class, 'updateSettings'])->name('updateSettings');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
