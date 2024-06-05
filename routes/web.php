<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','page\DashboardController@index');
Route::get('/login','AuthController@login');
Route::post('loginProses','AuthController@loginProses');

Route::middleware(['login'])->group(function () {


    // role super admin

    Route::middleware(['admin'])->group(function () {

        //dashboard
    });

    Route::middleware(['author'])->group(function () {

        //dashboard
        Route::resource('author/dashboard', 'author\dashboardController');
        Route::resource('author/artikel', 'author\artikelController');
        Route::resource('author/profile', 'author\profileController');
    });
});