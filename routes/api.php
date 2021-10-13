<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\CuisineController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function(){
    Route::get('/cuisines', 'CuisineController@index');
    Route::get('/cuisines/{slug}', 'CuisineController@show');
    
    Route::get('/restaurants', 'RestaurantController@index');
    Route::get('/restaurants/{slug}', 'RestaurantController@show');
    Route::get('/restaurants/{slug}/cuisines', 'RestaurantController@showCuisines');
    Route::get('/restaurants/{slug}/courses', 'RestaurantController@showCourses');
    Route::get('/restaurants/{slug}/{slugCourse}', 'PlateController@showByRestCourse');
    
    /* Route::post('/contact-us', 'CuisineController@store'); */
});