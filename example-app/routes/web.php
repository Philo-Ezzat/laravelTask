<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
















Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/{id}/delete', [ProductController::class, 'destroy'])->name('product.delete');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');   
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('product.update');

Route::get('/products/create/create', [ProductController::class, 'create'])->name('product.create');   
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');



Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/order',[OrderController::class,'index'])->name('order.index');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');