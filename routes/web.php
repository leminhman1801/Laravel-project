<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products/search', [ProductsController::class, 'search']);
Route::get('/trash/products', [ProductsController::class, 'trash'])->name('products.trash');
Route::put('/products/restore/{id}', [ProductsController::class, 'restore'])->name('products.restore');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::get('/products/details/{id}', [ProductsController::class, 'details'])->name('products.details');
Route::delete('/products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete')->middleware('web');
Route::delete('/products/destroy/{id}', [ProductsController::class, 'destroy'])->name('products.destroy')->middleware('web');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
