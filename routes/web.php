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

use Illuminate\Support\Facades\Route;

Route::get('login', 'Users\AuthController@loginView')->name('login.view');
Route::post('login', 'Users\AuthController@authenticate')->name('login.authenticate');

Route::middleware(['auth'])->group(function() {
    // User Routes Section
    Route::get('logout', 'Users\AuthController@logout')->name('logout');

    // Voucher Routes Section
    Route::prefix('vouchers')->group(function() {

        Route::get('customers', 'Vouchers\VoucherController@customers')->name('vouchers.customers');
        Route::get('', 'Vouchers\VoucherController@index')->name('vouchers.index');
        Route::get('create', 'Vouchers\VoucherController@create')->name('vouchers.create');
        Route::post('create', 'Vouchers\VoucherController@store')->name('vouchers.store');
        Route::get('verify', 'Vouchers\VoucherController@verifyview')->name('vouchers.verifyview');
        Route::post('verify', 'Vouchers\VoucherController@verify')->name('vouchers.verify');
        Route::get('release/{step}', 'Vouchers\ReleaseVoucherController@getRelease')->name('vouchers.getRelease');
        Route::post('release/{step}', 'Vouchers\ReleaseVoucherController@postRelease')->name('vouchers.postRelease');
        Route::get('{id}', 'Vouchers\VoucherController@show')->name('vouchers.show');
        Route::get('{id}/edit', 'Vouchers\VoucherController@edit')->name('vouchers.edit');
        Route::post('{id}/edit', 'Vouchers\VoucherController@update')->name('vouchers.update');
        Route::get('{id}/delete', 'Vouchers\VoucherController@delete')->name('vouchers.delete');
        Route::post('create-code', 'Vouchers\VoucherController@createCode')->name('vouchers.create-code');
        

    });

    // Customer Routes Section
    Route::prefix('customers')->group(function() {

        Route::get('', 'Customers\CustomerController@index')->name('customers.index');
        Route::get('create', 'Customers\CustomerController@create')->name('customers.create');
        Route::post('create', 'Customers\CustomerController@store')->name('customers.store');
        Route::get('{id}', 'Customers\CustomerController@show')->name('customers.show');
        Route::get('{id}/edit', 'Customers\CustomerController@edit')->name('customers.edit');
        Route::post('{id}/edit', 'Customers\CustomerController@update')->name('customers.update');
        Route::get('{id}/delete', 'Customers\CustomerController@delete')->name('customers.delete');

    });

    // Customer Classification Routes Section
    Route::prefix('customer-classifications')->group(function() {

        Route::get('', 'Customers\CustomerClassificationController@index')->name('customerClassifications.index');
        Route::get('create', 'Customers\CustomerClassificationController@create')->name('customerClassifications.create');
        Route::post('create', 'Customers\CustomerClassificationController@store')->name('customerClassifications.store');
        Route::get('{id}', 'Customers\CustomerClassificationController@show')->name('customerClassifications.show');
        Route::get('{id}/edit', 'Customers\CustomerClassificationController@edit')->name('customerClassifications.edit');
        Route::post('{id}/edit', 'Customers\CustomerClassificationController@update')->name('customerClassifications.update');
        Route::get('{id}/delete', 'Customers\CustomerClassificationController@delete')->name('customerClassifications.delete');

    });

    // Customer Classification Routes Section
    Route::prefix('filters')->group(function() {

        Route::post('store', 'Filters\FilterController@store')->name('filter.store');

    });
});

// Route::get('sendmail', function() {
//     $to_email = "trungtin0904@gmail.com";
//     $subject = "Simple Email Test via PHP";
//     $body = "Hi,nn This is test email send by PHP Script";
//     $headers = "From: Blockchain Evoucher";
    
//     if(mail($to_email, $subject, $body, $headers)) {
//         echo "success";
//     }
// });
    
