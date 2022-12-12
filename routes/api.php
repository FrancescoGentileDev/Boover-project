<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
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
Route::resource('category', 'api\CategoryController')->except(['create', 'edit', 'update', 'destroy'])->parameter('id', 'slug');
Route::post('inbox/{id}', function ($id, Request $request) {
    $request->validate([
        'nickname' => ['required', 'string', 'max:255'],
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['string', 'max:255']
    ]);
    $user = User::find($id);
    $user->inboxes()->create([
        'nickname' => $request->nickname,
        'title' => $request->title,
        'content' => $request->content,
        'email' => $request->email,
        'phone' => $request->phone
    ]);
    return response()->json(['message' => 'Message sent successfully']);

});
