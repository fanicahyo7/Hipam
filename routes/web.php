<?php

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
    return view('pages.welcome');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');
        Route::resource('retribusi', 'RetribusiController');

        Route::resource('rt', 'RtController');

        Route::get('rt_ubah/{id_rt}/id_rw/{id_rw}','RtController@edit')
        ->name('rt_ubah');
        Route::get('rt_hapus/{id_rt}/id_rw/{id_rw}','RtController@destroy')
        ->name('rt_hapus');


        Route::resource('rw', 'RwController');
        Route::resource('user', 'UserController');
    });