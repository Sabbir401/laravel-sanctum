<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\SiteUserController;
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
    return view('');
});

Route::resource("brand", BrandController::class);

Route::get('/register', [SiteUserController::class, 'index']);
Route::post('/register', [SiteUserController::class, 'store']);
Route::get('/user', [SiteUserController::class, 'show']);
Route::get('user/delete/{id}', [SiteUserController::class, 'delete'])->name('site_user.delete');
Route::get('user/details/{id}', [SiteUserController::class, 'details'])->name('site_user.details');
Route::get('user/edit/{id}', [SiteUserController::class, 'edit'])->name('site_user.edit');
Route::post('user/update/{id}', [SiteUserController::class, 'update'])->name('site_user.update');
