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

Auth::routes();

Route::middleware('auth')->namespace('Dashboard')->name('dashboard.')->prefix('dashboard')->group(function () {

    Route::get('/', 'DashboardController@index');

    Route::get('reviews', 'ReviewController@index')->name('reviews');

    Route::resource('inboxes', 'InboxController@index')->except(['update', 'edit', 'create', 'store']);

    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::match(['put', 'patch'], 'profile', 'ProfileController@updateProfile')->name('profile.update');

    Route::get('profile/sponsor', 'ProfileController@sponsor')->name('sponsor');
    Route::post('profile/sponsor', 'ProfileController@addToSponsor')->name('profile.sponsor');

    Route::get('stats', 'StatisticsController@index')->name('stats');
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
