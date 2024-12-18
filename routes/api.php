<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\Auth\LoginController as UserLoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::post("register", [UserRegisterController::class, "register"]);
Route::post("login", [UserLoginController::class, "login"]);
Route::post("logout", [UserLoginController::class, "logout"]);
Route::post("/create-payment-intent", [
    PaymentController::class,
    "createPaymentIntent",
]);
Route::get("/books", [BookController::class, "getBooksByCategory"]);
Route::get("/books/{book_id}/content", [
    BookController::class,
    "getBookContent",
]);
Route::get("/categories", [CategoryController::class, "index"]);
Route::get("/categories/{id}", [CategoryController::class, "show"]);
Route::post("/orders", [OrderController::class, "store"]);
Route::post("/feedbacks", [FeedbackController::class, "store"]);
Route::get("/allfeedbacks", [FeedbackController::class, "index"]);
Route::get("/previews/{content_id}", [PreviewController::class, "show"]);
Route::get("/books/search", [BookController::class, "searchBooks"]);
Route::prefix("password-reset")->group(function () {
    Route::post("/request-code", [
        PasswordResetController::class,
        "sendResetCode",
    ]);
    Route::post("/verify-code", [
        PasswordResetController::class,
        "verifyResetCode",
    ]);
    Route::post("/reset-password", [
        PasswordResetController::class,
        "resetPassword",
    ]);
});

Route::post("/update-profile", [UserController::class, "updateProfile"]);

