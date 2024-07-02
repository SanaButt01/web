<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Preview\PreviewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Book\BookController;
use App\Http\Controllers\Admin\Content\ContentController;
use App\Http\Controllers\Admin\User\UserController;
// ............Admin Auth Route................
Route::group(['prefix' => 'admin'], function () {
    Route::get('adminRegisterForm', [RegisterController::class,'showregistrationform'])->name('admin.register');
    Route::post('adminRegister', [RegisterController::class,'register'])->name('admin.submit.register');
    Route::get('adminLoginForm', [LoginController::class,'showloginform'])->name('admin.login');
    Route::post('adminLogin', [LoginController::class,'login'])->name('admin.submit.login');
    Route::post('adminLogout', [LoginController::class,'logout'])->name('admin.logout');
});
// ............Admin Dashboard...............
Route::group(['prefix' => 'admin', 'namespace'=>'Admin','middleware' => 'auth:admin'], function () {
         Route::get('admindashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
      
         // Example route definition
       });
       // Route::group(['prefix' => 'profile', 'namespace' => 'App\Http\Controllers\Admin\Profile'], function () {
       //        Route::get('profileindex/{admin}', 'ProfileController@index')->name('profile.index');
       //        Route::get('profileedit/{admin}', 'ProfileController@edit')->name('profile.edit');
       //        Route::put('profileupdate/{id}', 'ProfileController@update')->name('profile.update');
       //    });

          Route::group(['prefix' => 'category', 'namespace' => 'App\Http\Controllers\Admin\Category'], function () {
            Route::get('categoryindex', 'CategoryController@index')->name('category.index');
            Route::get('categorycreate', 'CategoryController@create')->name('category.create');
            Route::delete('categorydestroy/{id}', 'CategoryController@destroy')->name('category.destroy');
            Route::get('categoryedit/{category}', 'CategoryController@edit')->name('category.edit');
            Route::post('categorystore', 'CategoryController@store')->name('category.store');
            Route::put('categoryupdate/{category}', 'CategoryController@update')->name('category.update');
                   });
                   Route::group(['prefix' => 'book', 'namespace' => 'App\Http\Controllers\Admin\Book'], function () {
                    //Route::get('bookindex', 'BookController@index')->name('book.index');
                    Route::get('/admin/book', [BookController::class, 'index'])->name('admin.book.index');

                    Route::get('bookcreate', 'BookController@create')->name('admin.book.create'); 
                    Route::delete('bookdestroy/{book_id}', 'BookController@destroy')->name('book.destroy');
                    Route::get('bookedit/{book_id}', 'BookController@edit')->name('book.edit');
                    Route::post('bookstore', 'BookController@store')->name('book.store');
                    Route::put('bookupdate/{book_id}', 'BookController@update')->name('book.update');
                           });
                           Route::group(['prefix' => 'content', 'namespace' => 'App\Http\Controllers\Admin\Content'], function () {
                          
                            Route::get('contentcreate', 'ContentController@create')->name('admin.content.create'); 
                           
                            Route::get('/admin/content', [ContentController::class, 'index'])->name('admin.content.index');
        
                            Route::delete('contentdestroy/{id}', 'ContentController@destroy')->name('content.destroy');
                            Route::get('contentedit/{book}', 'ContentController@edit')->name('content.edit');
                            Route::post('contentstore', 'ContentController@store')->name('content.store');
                            Route::put('contentupdate/{book}', 'ContentController@update')->name('content.update');
                                   });
                                 
                                   Route::group(['prefix' => 'preview', 'namespace' => 'App\Http\Controllers\Admin\Preview'], function () {
                          
Route::get('/contents/{contentId}/previews/create', [PreviewController::class, 'create'])->name('previews.create');
Route::post('/contents/{contentId}/previews', [PreviewController::class, 'store'])->name('previews.store');
Route::get('/contents', [PreviewController::class, 'index'])->name('previews.index');
Route::delete('previewdestroy/{id}', 'PreviewController@destroy')->name('previews.destroy');
Route::get('previews/{content_id}/edit', [PreviewController::class, 'edit'])->name('previews.edit');
Route::post('previews/{content_id}', [PreviewController::class, 'update'])->name('previews.update');
} );
Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\Admin\User'], function () {
       Route::get('userindex', 'UserController@index')->name('admin.user.index');
      
              });                           

       

