<?php

use Illuminate\Support\Facades\Auth;
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
/*
Route::get('/new-login', function () {
    return view('newLogin');
});
Route::get('/new-register', function () {
    return view('newRegister');
});
Route::get('/new-forget', function () {
    return view('newForget');
});
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('productIn', 'ProductController@productIn');
Route::get('productInView', 'ProductController@productInView');

Route::get('productOut', 'ProductController@productOut');
Route::get('productOutView', 'ProductController@productOutView');

Route::get('productOut', 'ProductController@productOut');
Route::get('productOutView', 'ProductController@productOutView');

Route::resource('units', 'UnitController');
Route::resource('items', 'ItemController');
Route::resource('stocks', 'StockController');
Route::resource('damages', 'DamageController');
Route::resource('locations', 'LocationController');
Route::resource('suppliers', 'SupplierController');
Route::resource('categories', 'CategoryController');
Route::resource('requisitions', 'RequisitionController');
Route::get('item-date-report', 'ReportController@itemDateReport');
Route::get('daily-summary-report', 'ReportController@dailySummaryReport');


/*Route::get('/user', function () {
    return view('admin.users.index');
});
Route::get('/user', function () {
    return view('admin.users.create');
});*/
//Route::get('/user', 'UsersController@index')->name('home');
Route::resource('/users', 'UsersController');
