<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[GeneralController::class,'index'])->name('index');
Route::get('/portfolio',[GeneralController::class,'portfolio'])->name('portfolio');

// Route::get('/',[CarController::class,'index'])->name('cars.index');
// Route::get('/cars/create',[CarController::class,'create'])->name('cars.create');
// Route::post('/cars/store',[CarController::class,'store'])->name('cars.store');
// Route::get('/cars/{car}/edit',[CarController::class,'edit'])->name('cars.edit');
// Route::put('/cars/{car}/update',[CarController::class,'update'])->name('cars.update');
// Route::delete('/cars/{car}/destroy',[CarController::class,'destroy'])->name('cars.destroy');
// Route::get('/cars/{car}',[CarController::class,'show'])->name('cars.show');

Route::resource('cars', CarController::class);
Route::get('/cars/{car}/confirm',[CarController::class,'delete'])->name('cars.delete');
Route::get('/cars/{car}/trash',[CarController::class,'trash'])->name('cars.trash');
Route::get('/cars/{car}/avaliablity/toggle',[CarController::class,'toggleAvaliablity'])->name('cars.toggleAvaliablity');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('heros', HeroController::class);
Route::get('/heros/{hero}/confirm',[HeroController::class,'delete'])->name('heros.delete');

Route::resource('services', ServiceController::class);
Route::get('/services/{service}/confirm',[ServiceController::class,'delete'])->name('services.delete');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);


