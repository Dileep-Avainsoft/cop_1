<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarStageController;
use App\Http\Controllers\BrandController;

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

Route::get('carstage/insert',[CarStageController::class,'insert'])->name('carstage.insert');
Route::post('carstage/store',[CarStageController::class,'store'])->name('carstage.store');
Route::get('carstage/view',[CarStageController::class,'view'])->name('carstage.view');
Route::get('carstage/edit/{id}',[CarStageController::class,'edit'])->name('carstage.edit');
Route::put('carstage/update/{id}',[CarStageController::class,'update'])->name('carstage.update');
Route::get('carstage/delete/{id}',[CarStageController::class,'destroy'])->name('carstage.delete');

//brand Route

Route::get('brand/insert',[BrandController::class,'insert'])->name('brand.insert');
Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('brand/view',[BrandController::class,'view'])->name('brand.view');


});

require __DIR__.'/auth.php';
