
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Books;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('admin.auth.login');
}
);
Route::get('/form', function () {
  return view('form');
});
Route::get('/wid', function () {
	return view('widgets.dashboard_widgets');
  });
Route::get('/new', function () {
  return view('new');
});
Route::post('/form',[AdminController::class,'booksave']);

// Route::get('/ctrl',[demoCtrl::class,'index']);
// Route::get('/about',[demoCtrl::class,'home']);
Route::get('/about',);
// Route::get('/Register',[AdminController::class,'show']);

// Route::post('/Register',[AdminController::class,'Register']);
// Route::get('/customer', function () {
//   $customers=customers::all();
//   echo"<pre>";
//   print_r($customers);  
// });
// Route::get('/Register/view',[AdminController::class,'view']);
// Route::get('/books',[AdminController::class,'viewbooks']);
// Route::get('/image/upload', [AdminController::class, 'addbooks'])->name('image.form');

// // Route to handle form submission
// Route::post('/image/upload', [AdminController::class, 'store'])->name('image.store');
// // Example route definition


// Route::get('/image/gallery', [AdminController::class, 'viewbooks'])->name('image.gallery');
// // Example route definition
// Route::get('/books/delete/{id}', [AdminController::class,'deletebooks'])->name('books.delete');
// Route::get('/books/edit/{id}', [AdminController::class,'editbooks'])->name('books.edit');
//  Route::post('/books/update/{id}', [AdminController::class,'updatebooks'])->name('books.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
  return view('admin.auth.login');
});Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

