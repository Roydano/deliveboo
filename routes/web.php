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
    return view('guest.home');
});

Route::resource('/restaurants','RestaurantController');
Route::resource('/plates', 'PlateController');


Route::get('/register/{id}', 'Auth\RegisterController@showRegistrationForm');
Route::get('/plates/{id}, PlateController@index');

Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
->group(function() {
// pagina di atterraggio dopo il login (con il prefisso, l'url è '/admin')
    Route::get('/', 'HomeController@index')->name('index');
    
}); 

