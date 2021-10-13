<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\PlateController;

/* header('Access-Control-Allow-Origin: *'); */
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

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
    Route::get('/courses', 'CourseController@index');
    Route::get('/courses/{slugCourse}', 'CourseController@show');
    Route::get('/cuisines', 'CuisineController@index');
    Route::get('/cuisines/{slug}', 'CuisineController@show');
    Route::get('/plates', 'PlateController@index');
    
    Route::get('/restaurants', 'RestaurantController@index');
    Route::get('/restaurants/{slug}', 'RestaurantController@show');
    Route::get('/restaurants/{slug}/cuisines', 'RestaurantController@showCuisines');
    
    /* Route::get('/restaurants/{slug}/courses', 'RestaurantController@showCourses'); */

    Route::get('/restaurants/{slug}/{slugCourse}', 'PlateController@showByRestCourse');

    Route::get('/restaurants/{slug}/plates', 'RestaurantController@showMenu');

   
    /* Route::post('/contact-us', 'CuisineController@store'); */
});