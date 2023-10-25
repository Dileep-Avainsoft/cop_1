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

Route::get('car_stage/insert',[CarStageController::class,'insert'])->name('car_stage.insert');
Route::post('car_stage/store',[CarStageController::class,'store'])->name('car_stage.store');
Route::get('car_stage/view',[CarStageController::class,'view'])->name('car_stage.view');
Route::get('car_stage/edit/{id}',[CarStageController::class,'edit'])->name('carstage.edit');
Route::put('car_stage/update/{id}',[CarStageController::class,'update'])->name('carstage.update');
Route::get('car_stage/delete/{id}',[CarStageController::class,'destroy'])->name('carstage.delete');

//brand Route

Route::get('brand/insert',[BrandController::class,'insert'])->name('brand.insert');
Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('brand/view',[BrandController::class,'view'])->name('brand.view');
Route::post('brand/status',[BrandController::class,'toggleStatus'])->name('brand.status');
Route::get('brand/{id}/edit',[BrandController::class,'edit'])->name('brand.edit');
Route::put('brand/{id}/update',[BrandController::class,'update'])->name('brand.update');
Route::get('brand/{id}/delete',[BrandController::class,'destroy'])->name('brand.delete');


});

require __DIR__.'/auth.php';
