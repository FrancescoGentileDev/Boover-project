<?php

use App\Http\Controllers\Dashboard\ThemeController;
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

Auth::routes();

Route::middleware('auth')->namespace('Dashboard')->name('dashboard.')->prefix('dashboard')->group(function () {

    Route::get('/', 'DashboardController@index')->name('home');

    Route::resource('reviews', 'ReviewController')->except(['create', 'update', 'store', 'edit', 'delete']);

    Route::resource('inboxes', 'InboxController')->except(['update', 'edit', 'create', 'store']);

    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::match(['put', 'patch'], 'profile', 'ProfileController@updateProfile')->name('profile.update');

    Route::get('profile/sponsor', 'SponsorController@sponsor')->name('sponsor');
    Route::post('profile/sponsor', 'SponsorController@addToSponsor')->name('profile.sponsor.store');

    Route::get('stats', 'StatisticsController@index')->name('stats');

    Route::get('settings', 'SettingsController@index')->name('settings');

    Route::any('/payment', 'BraintreeController@token')->name('sponsor.payment');
    Route::any('/checkout', 'BraintreeController@checkout')->name('sponsor.checkout');

    Route::post('themeSwitch', 'ThemeController@switch')->name('themeSwitch');

    Route::get('{catchall}', 'redirects@redirect')->where('catchall', '.*');
});

Route::get('{any?}', 'dashboard\guestController@guest')->where('any', '.*');

