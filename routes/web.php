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

Route::get('/', 'LoginController@getLogin')->name('loginform');
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

Route::get('admin/edittable', 'TableController@index')->name('admin.table');

Route::get('admin/saledata', 'SaleController@index')->name('admin.saledata');
Route::get('admin/review', 'SaleController@review')->name('admin.review');

Route::get('admin/setting/kitchen', 'SettingController@kitchen')->name('admin.setting.kitchen');
Route::get('admin/setting/timeslots', 'SettingController@timeslots')->name('admin.setting.timeslots');
Route::get('admin/setting/htimeslots', 'SettingController@htimeslots')->name('admin.setting.htimeslots');
Route::get('admin/setting/customer', 'SettingController@customer')->name('admin.setting.customer');

Route::get('admin/setting/gst', 'SettingController@gst')->name('admin.setting.gst');
Route::post('admin/setting/gst', 'SettingController@gstpost')->name('admin.setting.gst.save');
Route::get('admin/setting/payment', 'SettingController@payment')->name('admin.setting.payment');
Route::get('admin/setting/receipt', 'SettingController@receipt')->name('admin.setting.receipt');
Route::post('admin/setting/receipt', 'SettingController@receiptpost')->name('admin.setting.receipt.save');

Route::get('admin/setting/badge', 'SettingController@badge')->name('admin.setting.badge');
Route::get('admin/setting/language', 'SettingController@language')->name('admin.setting.language');
Route::get('admin/setting/password', 'SettingController@password')->name('admin.setting.password');

Route::post('admin/setting/kitchenpost', 'SettingController@kitchen_post')->name('admin.setting.kitchen.post');
Route::post('admin/setting/timeslotpost', 'SettingController@timeslot_post')->name('admin.setting.timeslots.post');
Route::post('admin/setting/htimeslotpost', 'SettingController@htimeslot_post')->name('admin.setting.htimeslots.post');
Route::post('admin/setting/addbadge', 'SettingController@addbadge')->name('admin.setting.addbadge');
Route::post('admin/setting/customerpost', 'SettingController@customer_post')->name('admin.setting.customer.save');
Route::post('admin/setting/languagepost', 'SettingController@language_post')->name('admin.setting.language.save');
Route::post('admin/setting/passwordpost', 'SettingController@password_post')->name('admin.setting.password.save');
Route::post('admin/setting/activebadge', 'SettingController@active_badge')->name('admin.setting.activebadge');
Route::post('admin/setting/paymentpost', 'SettingController@payment_post')->name('admin.setting.payment.post');
