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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', 'api\UserController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::get('reviews/{id}', 'api\ReviewController@getReview')->name('reviews.get');
Route::resource('skills', 'api\SkillController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::resource('category', 'api\CategoryController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::post('sendMessage', 'api\InboxController@sendMessage')->name('inbox.send');

Route::post('review/send', function (Request $request) {
    $request->validate([
        'user_id' => ['required', 'exists:users,id'],
        'nickname' => ['required', 'string', 'max:32'],
        'title' => [ 'string', 'max:50'],
        'description' => ['required', 'string', 'max:255'],
        'vote' => ['required', 'integer', 'min:1', 'max:5'],
    ]);
    //

    $inbox = new Review();
    $inbox->fill($request->all());
    $inbox->save();
    return response($inbox, 200);

} )->name('reviews.send');
