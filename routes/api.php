<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', 'api\UserController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::resource('reviews', 'api\ReviewController')->except(['create', 'edit', 'update', 'destroy', 'index'])->parameter('id', 'slug');
Route::resource('skills', 'api\SkillController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
