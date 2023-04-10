<?php

use App\Http\Controllers\MaterialController;
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

Route::get('/', function () {
    return to_route('materi');
});

Route::get('materi', [MaterialController::class, 'index'])->name('materi');
Route::post('materi/store', [MaterialController::class, 'store'])->name('materi.store');
Route::post('materi/list', [MaterialController::class, 'list'])->name('materi.list');
Route::delete('materi/{material}/destroy', [MaterialController::class, 'destroy'])->name('materi.destroy');
