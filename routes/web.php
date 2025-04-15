<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\ProductClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// trang chủ
Route::get('/', [ProductClientController::class, 'index'])->name('client.products.index');

// trang chi tiết sản phẩm
Route::get('/products/{id}', [ProductClientController::class, 'show'])->name('client.products.show');


// trang danh sách sản phẩm theo danh mục

Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::post('/login', [AuthController::class, 'login']);

//logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


// phân quyền cho user
Route::middleware('client')->group(function () {
    Route::get('/list', function () {
        return view('client.list');
    });
});

// phân quyền cho admin
Route::middleware('admin')->group(function () {
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/products', ProductController::class);
    Route::resource('admin/users', UserController::class);
});





