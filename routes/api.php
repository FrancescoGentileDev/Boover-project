<?php

use App\models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Storage;

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

Route::resource('users', 'api\UserController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::get('reviews/{id}', 'api\ReviewController@getReview')->name('reviews.get');
Route::resource('skills', 'api\SkillController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::resource('category', 'api\CategoryController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::post('sendMessage', 'api\InboxController@sendMessage')->name('inbox.send');

Route::post('review/send','api\ReviewController@SendReview' )->name('reviews.send');
