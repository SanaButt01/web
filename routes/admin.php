<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Preview\PreviewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Feedback\FeedbackController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Book\BookController;
use App\Http\Controllers\Admin\Content\ContentController;
use App\Http\Controllers\UserController;

// Admin Auth Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('adminRegisterForm', [RegisterController::class, 'showregistrationform'])->name('admin.register');
    Route::post('adminRegister', [RegisterController::class, 'register'])->name('admin.submit.register');
    Route::get('adminLoginForm', [LoginController::class, 'showloginform'])->name('admin.login');
    Route::post('adminLogin', [LoginController::class, 'login'])->name('admin.submit.login');
    Route::post('adminLogout', [LoginController::class, 'logout'])->name('admin.logout');
});

// Admin Dashboard Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('admindashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::get('adminedit/{admin}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('adminupdate/{id}', [AdminController::class, 'update'])->name('admin.update');

    // Category Routes
    Route::group(['prefix' => 'category'], function () {
        Route::get('index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('update/{category}', [CategoryController::class, 'update'])->name('category.update');
    });

    // Book Routes
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', [BookController::class, 'index'])->name('admin.book.index');
        Route::get('create', [BookController::class, 'create'])->name('admin.book.create');
        Route::delete('destroy/{book_id}', [BookController::class, 'destroy'])->name('book.destroy');
        Route::get('edit/{book_id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('store', [BookController::class, 'store'])->name('book.store');
        Route::put('update/{book_id}', [BookController::class, 'update'])->name('book.update');
    });
    Route::group(['prefix' => 'order'], function () {
   
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/statuscreate', [OrderController::class, 'storeStatus'])->name('status.store');
        Route::get('/status', [OrderController::class, 'create'])->name('orders.status');

        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('status.edit');
        Route::put('update/{id}', [OrderController::class, 'update'])->name('status.update');
    });
    Route::group(['prefix' => 'feedback'], function () {
   
        Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
      
    });
    // Content Routes
    Route::group(['prefix' => 'content'], function () {
        Route::get('create', [ContentController::class, 'create'])->name('admin.content.create');
        Route::get('/', [ContentController::class, 'index'])->name('admin.content.index');
        Route::delete('destroy/{id}', [ContentController::class, 'destroy'])->name('content.destroy');
        Route::get('edit/{book}', [ContentController::class, 'edit'])->name('content.edit');
        Route::post('store', [ContentController::class, 'store'])->name('content.store');
        Route::put('update/{book}', [ContentController::class, 'update'])->name('content.update');
    });
    Route::group(['prefix'=>'preview'], function () {
        Route::get('/contents/{contentId}/previews/create', [PreviewController::class, 'create'])->name('previews.create');
        Route::post('/contents/{contentId}/previews', [PreviewController::class, 'store'])->name('previews.store');
        Route::get('/contents', [PreviewController::class, 'index'])->name('previews.index');
        Route::delete('previews/{id}', [PreviewController::class, 'destroy'])->name('previews.destroy');
        Route::get('previews/{content_id}/edit', [PreviewController::class, 'edit'])->name('previews.edit');
        Route::put('previews/{content_id}', [PreviewController::class, 'update'])->name('previews.update');
        Route::post('previews/{content_id}/editImage/{preview_id}', [PreviewController::class, 'updateImage'])->name('previews.updateImage');
        Route::post('previews/{content_id}/deleteImage/{preview_id}', [PreviewController::class, 'deleteImage'])->name('previews.deleteImage');
    });
    

    // User Routes
    Route::group(['prefix' => 'user'], function () {
        Route::get('index', [UserController::class, 'index'])->name('admin.user.index');
        // Add other user-related routes here
    });
});