
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

Route::get('/wel', function () {
  return view('welcome');
}
);
Route::get('/', function () {
  return view('admin.auth.login');
}
);



Auth::routes();
