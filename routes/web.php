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

Route::get('admin/login', 'LoginController@adminLogin')->name('admin.check');
Route::post('admin/login', 'LoginController@adminPostLogin')->name('admin.login');

Route::get('admin/home', 'HomeController@index')->name('admin.home');

Route::get('admin/bookings', 'BookingController@index')->name('admin.booking');
Route::get('admin/booking/edit', 'BookingController@edit')->name('admin.booking.edit');

Route::get('admin/transactions', 'TransactionController@index')->name('admin.transaction');

Route::get('admin/review', 'SaleController@review')->name('admin.review');

Route::get('reception/seated', 'ReceptionController@seated')->name('reception.seated');
Route::get('reception/waiting', 'ReceptionController@waiting')->name('reception.waiting');
Route::get('reception/booking', 'ReceptionController@booking')->name('reception.booking');
Route::get('reception/addCustomer', 'ReceptionController@addCustomer')->name('reception.addCustomer');
Route::post('reception/store', 'ReceptionController@store')->name('reception.store');

Route::get('customer/index', 'CustomerController@index')->name('customer.index');

Route::group(['middleware' => 'checkadmin'], function(){
    Route::get('admin/category', 'CategoryController@index')->name('admin.category');
    Route::post('admin/category/add', 'CategoryController@add')->name('admin.category.add');
    Route::get('admin/category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    Route::post('admin/category/subs', 'CategoryController@subs')->name('admin.category.subs');
    Route::post('admin/category/subs_list', 'CategoryController@subs_list')->name('admin.category.subs_list');
    Route::post('admin/category/dish_list', 'CategoryController@dish_list')->name('admin.category.dish_list');
    Route::get('admin/category/dish_delete/{id}', 'CategoryController@dish_delete')->name('admin.category.dish_delete');
    Route::get('admin/category/dish_add', 'CategoryController@dish_add')->name('admin.category.dish_add');

    Route::get('admin/dish', 'DishController@index')->name('admin.dish');
    Route::get('admin/dish/preview/{id}', 'DishController@preview')->name('admin.dish.preview');
    Route::get('admin/dish/edit/{id}', 'DishController@edit')->name('admin.dish.edit');
    Route::get('admin/dish/delete/{id}', 'DishController@deleteDish')->name('admin.dish.delete');
    Route::get('admin/dish/add', 'DishController@add')->name('admin.dish.add');
    Route::get('admin/dish/sort', 'DishController@sortDish')->name('admin.dish.sort');
    Route::post('admin/dish/store', 'DishController@store')->name('admin.dish.store');
    Route::post('admin/dish/previewpost', 'DishController@previewpost')->name('admin.dish.previewpost');

    Route::get('admin/option', 'OptionController@index')->name('admin.option');
    Route::get('admin/option/edit/{id}', 'OptionController@edit')->name('admin.option.edit');
    Route::get('admin/option/add', 'OptionController@add')->name('admin.option.add');
    Route::get('admin/option/sort', 'OptionController@sortOption')->name('admin.option.sort');
    Route::post('admin/option/store', 'OptionController@store')->name('admin.option.store');
    Route::get('admin/option/delete/{id}', 'OptionController@delete')->name('admin.option.delete');

    Route::get('admin/discount', 'DiscountController@index')->name('admin.discount');
    Route::get('admin/discount/add', 'DiscountController@add')->name('admin.discount.add');
    Route::get('admin/discount/edit/{id}', 'DiscountController@edit')->name('admin.discount.edit');
    Route::post('admin/discount/store', 'DiscountController@store')->name('admin.discount.store');
    Route::get('admin/discount/sort', 'DiscountController@sortOption')->name('admin.discount.sort');

    Route::get('admin/table', 'TableController@index')->name('admin.table');
    Route::post('admin/table/store', 'TableController@store')->name('admin.table.store');

    Route::get('admin/saledata', 'SaleController@index')->name('admin.saledata');

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
});
