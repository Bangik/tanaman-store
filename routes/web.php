<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// route group with middleware auth and admin
Route::group(['middleware' => ['auth', 'admin']], function () {
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::resource('users', 'App\Http\Controllers\Admin\UserController');
  Route::resource('plants', 'App\Http\Controllers\Admin\PlantController');
  Route::resource('transactions', 'App\Http\Controllers\Admin\TransactionController');
});

Route::get('/', 'App\Http\Controllers\User\LandingController@index')->name('landing');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/cart', 'App\Http\Controllers\User\TransactionController@indexCart')->name('cart');
  Route::get('/cart/add/{id}', 'App\Http\Controllers\User\TransactionController@addToCart')->name('cart.add');
  Route::patch('/cart/{id}', 'App\Http\Controllers\User\TransactionController@update')->name('cart.update');
  Route::delete('/cart/{id}', 'App\Http\Controllers\User\TransactionController@destroy')->name('cart.destroy');

  Route::get('/history-transactions', 'App\Http\Controllers\User\TransactionController@index')->name('transactions.user.index');
  Route::get('/transactions/user/{id}', 'App\Http\Controllers\User\TransactionController@show')->name('transactions.user.show');
  Route::post('/transactions/user', 'App\Http\Controllers\User\TransactionController@store')->name('transactions.user.store');
  Route::post('/transactions/user/upload/{id}', 'App\Http\Controllers\User\TransactionController@upload')->name('transactions.user.upload');

  Route::get('/profile', 'App\Http\Controllers\User\ProfileController@index')->name('profile.index');
  Route::patch('/profile', 'App\Http\Controllers\User\ProfileController@update')->name('profile.update');
  Route::get('/profile/password', 'App\Http\Controllers\User\ProfileController@editPassword')->name('profile.edit.password');
  Route::patch('/profile/password', 'App\Http\Controllers\User\ProfileController@updatePassword')->name('profile.update.password');
});