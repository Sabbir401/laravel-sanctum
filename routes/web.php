<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteUserController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\VariationOptionController;
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
    return view('/product');
});

Route::resource("brand", BrandController::class);

Route::get('/register', [SiteUserController::class, 'index']);
Route::post('/register', [SiteUserController::class, 'store']);
Route::get('/user', [SiteUserController::class, 'show']);
Route::get('/user/trash', [SiteUserController::class, 'trash']);
Route::get('user/delete/{id}', [SiteUserController::class, 'delete'])->name('site_user.delete');
Route::get('user/restore/{id}', [SiteUserController::class, 'restore'])->name('site_user.restore');
Route::get('user/details/{id}', [SiteUserController::class, 'details'])->name('site_user.details');
Route::get('user/edit/{id}', [SiteUserController::class, 'edit'])->name('site_user.edit');
Route::post('user/update/{id}', [SiteUserController::class, 'update'])->name('site_user.update');


Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'getSubCategory'])->name('getSubCategory');
Route::post('product/var', [ProductController::class, 'getvariation'])->name('getVariation');
Route::post('product/submit', [ProductController::class, 'store'])->name('product.submit');
Route::get('productAll', [ProductController::class, 'show']);
Route::get('/products', [ProductController::class, 'display']);
Route::get('/productdetails/{id}', [ProductController::class, 'details'])->name('product.details');
Route::get('/productsingle/{id}', [ProductController::class, 'single'])->name('product.single');

Route::get('product/category', [ProductCategoryController::class, 'show']);
Route::post('product/category', [ProductCategoryController::class, 'store'])->name('categories.store');
Route::get('product/subcategory', [ProductCategoryController::class, 'display']);
Route::post('product/subcategory', [ProductCategoryController::class, 'create'])->name('sub.create');


Route::get('product/variation', [VariationController::class, 'index']);
Route::post('product/variation', [VariationController::class, 'store'])->name('variation.store');

Route::get('product/variationOption', [VariationOptionController::class, 'index']);
Route::post('product/variationOption', [VariationOptionController::class, 'store'])->name('variationOption.store');

