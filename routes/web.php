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
Route::get('logout','AuthController@logout');
Route::post('loginProses','AuthController@loginProses');
Route::get('register','AuthController@register');
Route::post('registerProses','AuthController@registerProses');
Route::middleware(['login'])->group(function () {


    // role super admin

    Route::middleware(['admin'])->group(function () {

        Route::resource('admin/dashboard','page\DashboardController');
    });

    Route::middleware(['sekretaris'])->group(function () {

        //dashboard
        Route::resource('sekretaris/dashboard','page\DashboardController');
    });
});