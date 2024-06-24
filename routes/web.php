<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;

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


Route::middleware('auth')
    ->prefix('admin') // Prefisso nell'url delle rotte di questo gruppo
    ->name('admin.') // Inizio di ogni nome delle rotte del gruppo
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // per implementare la funzione show lo avviso che gli passerò come paramentro lo slug al posto dell'id
        Route::resource('project', ProjectController::class)->parameters(['project'=>'project:slug']);
    });

require __DIR__.'/auth.php';
