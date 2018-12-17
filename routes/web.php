<?php

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

Route::get('login', 'LoginController@getLogin')->name('loginform');
Route::post('login', 'LoginController@postLogin')->name('login');

Route::get('admin/home', 'HomeController@index')->name('admin.home');

Route::get('admin/dishes', 'DishController@index')->name('admin.dish');
Route::get('admin/dish/preview', 'DishController@preview')->name('admin.dish.preview');
Route::get('admin/dish/edit', 'DishController@edit')->name('admin.dish.edit');

Route::get('admin/bookings', 'BookingController@index')->name('admin.booking');
Route::get('admin/booking/edit', 'BookingController@edit')->name('admin.booking.edit');

Route::get('admin/transactions', 'TransactionController@index')->name('admin.transaction');

Route::get('admin/category', 'CategoryController@index')->name('admin.category');

Route::get('admin/setting/kitchen', 'SettingController@kitchen')->name('admin.setting.kitchen');
Route::get('admin/setting/timeslots', 'SettingController@timeslots')->name('admin.setting.timeslots');
Route::get('admin/setting/htimeslots', 'SettingController@htimeslots')->name('admin.setting.htimeslots');
Route::get('admin/setting/customer', 'SettingController@customer')->name('admin.setting.customer');

Route::get('admin/setting/gst', 'SettingController@gst')->name('admin.setting.gst');
Route::get('admin/setting/payment', 'SettingController@payment')->name('admin.setting.payment');
Route::get('admin/setting/receipt', 'SettingController@receipt')->name('admin.setting.receipt');

Route::get('admin/setting/badge', 'SettingController@badge')->name('admin.setting.badge');
Route::get('admin/setting/language', 'SettingController@language')->name('admin.setting.language');
Route::get('admin/setting/password', 'SettingController@password')->name('admin.setting.password');
