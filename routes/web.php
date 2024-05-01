<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('services', [HomeController::class, 'services'])->name('services');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('auth/register', [RegisterController::class, 'registerForm'])->name('register.form');

Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'loginForm'])->name('login.form');

Route::middleware(['auth'])->group(function () {

Route::get('customer/home', [CustomerController::class, 'index'])->name('customer.home');

/******************************************** This Route is For Logout *****************************/
Route::get('/logout', function (Request $request) {
  Session::flush();
  Auth::logout();

  return redirect()->route('welcome');
})->name('logout');
/******************************************** This Route is For Logout *****************************/

});
