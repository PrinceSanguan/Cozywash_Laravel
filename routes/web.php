<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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
/******************************************** This Route is For Customer *****************************/
Route::get('customer/home', [CustomerController::class, 'index'])->name('customer.home');
Route::get('customer/services', [CustomerController::class, 'services'])->name('customer.services');
Route::get('customer/about', [CustomerController::class, 'about'])->name('customer.about');
Route::get('customer/receipt', [CustomerController::class, 'receipt'])->name('customer.receipt');
Route::get('customer/loyalty', [CustomerController::class, 'loyalty'])->name('customer.loyalty');

Route::get('customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
Route::post('customer/profile', [CustomerController::class, 'editProfile'])->name('customer.editProfile');
/******************************************** This Route is For Customer *****************************/

/******************************************** This Route is For Admin *****************************/
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('admin/invoice/{id?}', [AdminController::class, 'invoice'])->name('admin.invoice');
Route::get('admin/searchCustomers', [AdminController::class, 'searchCustomers'])->name('admin.searchCustomers');
Route::post('admin/invoice', [AdminController::class, 'invoicePost'])->name('admin.invoice.post');



Route::get('admin/history', [AdminController::class, 'history'])->name('admin.history');

Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::post('admin/users', [AdminController::class, 'addStaff'])->name('admin.addStaff');
/******************************************** This Route is For Admin *****************************/

/******************************************** This Route is For Logout *****************************/
Route::get('/logout', function (Request $request) {
  Session::flush();
  Auth::logout();

  return redirect()->route('welcome');
})->name('logout');
/******************************************** This Route is For Logout *****************************/

});
