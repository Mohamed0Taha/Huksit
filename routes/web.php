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

Route::get('/', function () {
	$salons=Salon::all();
 return view('welcome',compact('salons'));
});

Route::get('/new', function () {
	
 return view('create_salon');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/new', 'salonController@store')->name('salon.store');