<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = DB::table('users')->paginate(16, ['name', 'lastname', 'avatar', 'slug', 'phone', 'presentation', 'detailed_description', 'is_available' ]);
        return response($users);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        $user = $user->makeHidden(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'id']); // hide useless params
        $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        return response($user);
    }
}
