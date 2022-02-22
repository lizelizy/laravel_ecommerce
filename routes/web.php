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
    return view('welcome');
});

//auth route for both
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name
    ('dashboard');
});

//for users
Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/dashboard/mycart', 'App\Http\Controllers\DashboardController@mycart')->name
    ('dashboard.mycart');
});

//for admin
Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/dashboard/store', 'App\Http\Controllers\DashboardController@store')->name
    ('dashboard.store');
});


require __DIR__.'/auth.php';
