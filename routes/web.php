<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/categories','CategoriesController')->middleware('auth');
Route::resource('/categoryMovies','CategoryMoviesController')->middleware('auth');
Route::resource('/movieRentals','MovieRentalsController')->middleware('auth');
Route::resource('/movies','MoviesController')->middleware('auth');
Route::resource('/rentals','RentalsController')->middleware('auth');
Route::resource('/users', 'UsersController')->middleware('auth');
Route::get('/pdf', 'PDFController@PDF')->name('pdf');