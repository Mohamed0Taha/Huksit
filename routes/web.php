<?php
use App\salon;
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
Auth::routes();

Route::get('/', 'salonController@index');
Route::get('/show/{id}', 'salonController@show');
Route::get('/service/{id}', 'serviceController@show');

Route::get('/salon_create', 'salonController@create');
Route::post('/salon_create', 'salonController@store');
Route::get('/service_create', 'serviceController@create');

Route::post('/service_create', 'serviceController@store');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ajax_url/{service_id}/{exec_date}', 'BookingController@ajax_url');

Route::get('/test', function () {

    return view('test', ['name' => 'James']);
});