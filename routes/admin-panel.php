<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin panel routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" and "auth" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\City\CityController;

// Home
Route::view('/home', 'home.home')->name('home');

// Companies
Route::resource('companies', 'Companies\CompanyController');

// Employees
Route::resource('employees', 'Employees\EmployeeController');

//pay
Route::resource('payments', 'Payment\PaymentController');
Route::resource('cities', 'City\CityController');

Route::post('/payment', [PaymentController::class,'payment']);
Route::post('/cities', [CityController::class,'distance']);