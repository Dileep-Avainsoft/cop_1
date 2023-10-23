<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarSatgeController;

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
    return view('auth.login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//car_satge route

Route::get('carstage/insert',[CarSatgeController::class,'create'])->name('carstage.insert');
Route::post('carstage/store',[CarSatgeController::class,'store'])->name('carstage.store');
Route::get('carstage/view',[CarSatgeController::class,'show'])->name('carstage.view');
Route::get('carstage/edit/{id}',[CarSatgeController::class,'edit'])->name('carstage.edit');
Route::put('carstage/update/{id}',[CarSatgeController::class,'update'])->name('carstage.update');
Route::get('carstage/delete/{id}',[CarSatgeController::class,'destroy'])->name('carstage.delete');

//model Route




});

require __DIR__.'/auth.php';
