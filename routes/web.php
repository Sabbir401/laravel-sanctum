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

Route::get('/login', function () {
    return view('login');
});

Route::resource("brand", BrandController::class);

Route::get('/register', [SiteUserController::class, 'index']);
Route::post('/register', [SiteUserController::class, 'store']);
Route::get('/customer', [SiteUserController::class, 'show']);
