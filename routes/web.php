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

// Route::get('/','page\DashboardController@index');
Route::get('/','AuthController@login');
Route::get('logout','AuthController@logout');
Route::post('loginProses','AuthController@loginProses');
Route::get('register','AuthController@register');
Route::post('registerProses','AuthController@registerProses');
Route::middleware(['login'])->group(function () {


    Route::middleware(['admin'])->group(function () {

        Route::resource('admin/dashboard','page\Admin\DashboardController');
        Route::resource('admin/anggota','page\Admin\AnggotaController');
        Route::resource('admin/jabatan','page\Admin\JabatanController');


        Route::delete('delete-item/{id}', 'page\Admin\JabatanController@destroy')->name('delete-item');
        Route::delete('delete-item/{id}', 'page\Admin\AnggotaController@destroy')->name('delete-item');
        Route::resource('admin/crud','SimpleCrudController');
    });

    Route::middleware(['sekretariat'])->group(function () {

        Route::resource('sekretariat/dashboard','page\Sekretariat\DashboardController');
        Route::resource('sekretariat/anggota','page\Sektretarit\AnggotaController');
        Route::resource('sekretariat/jabatan','page\Sekretariat\JabatanController');

        Route::delete('delete-item/{id}', 'page\Admin\JabatanController@destroy')->name('delete-item');
        Route::delete('delete-item/{id}', 'page\Admin\AnggotaController@destroy')->name('delete-item');
        Route::resource('sekretariat/crud','SimpleCrudController');
    });
});