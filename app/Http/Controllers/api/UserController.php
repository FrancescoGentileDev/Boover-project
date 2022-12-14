<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $sendParams = ['name', 'lastname', 'avatar', 'slug', 'phone', 'presentation', 'detailed_description', 'birthday_date', 'id'];


    protected $casts = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query()
            ->leftJoin('sponsor_user', 'users.id', '=', 'sponsor_user.user_id')
            ->select('users.id', 'users.name', 'users.lastname', 'users.avatar', 'users.slug', 'users.phone', 'users.presentation', 'users.detailed_description', 'users.birthday_date')
            ->addSelect(DB::raw('IF(sponsor_user.expire_date > NOW(), 1, 0) as is_sponsorized'))
            ->orderBy('is_sponsorized', 'desc');

        $search = explode('-', $request->search);
        if ($request->has('search')) {
            foreach ($search as $param) {
                $users->whereRaw("concat(name, ' ', lastname) like '%" . $param . "%' ");
            };
        }
        if ($request->has('only_sponsor')) {
            $users->where('sponsor_user.expire_date', '>', now());
        }
        if ($request->has('category')) {
            $users->whereHas('skills', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });
        }

        if ($request->has('skill')) {
            $users->whereHas('skills', function ($query) use ($request) {
                $query->where('id', $request->skill);
            });
        }

        $users->withCount('reviews');

        //TODO PRIMA I PROFILI SPONSOR

        $users->with(['skills' => function ($query) {
            $query->select('skills.id', 'skills.name', 'skills.slug', 'skills.category_id', 'skills.description', 'skills.image', 'categories.name as category_name', 'categories.slug as category_slug', 'categories.id as category_id')
                ->leftJoin('categories', 'skills.category_id', '=', 'categories.id');
        }]);

        $users = $users->paginate(10); // hide useless params

        foreach ($users as $user) {
            $user->reviews_rating =  $user->reviews()->avg('vote');
        }

        $users->getCollection()->transform(function ($user) {
            $user = $user->makeHidden(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'id']); // hide useless params
            $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'category_id', 'description', 'image', 'slug']); // hide pivot table

            return $user;
        });

        foreach ($users as $user) {
            $user->user_id = $user->id;
        }

        return response($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = 0;
        if($request->has('slug')) {
            $user = User::where('slug', $id)->first();
        }
        else
        {
            $user = User::find($id);
        }

        $user->reviews_rating =  $user->reviews()->avg('vote');
        $user->reviews_count =  $user->reviews()->count();
        $user->with('sponsors');
        $user->user_id = $user->id;

        $user = $user->makeHidden(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'id']); // hide useless params
        $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        $user->reviews->makeHidden(['created_at', 'updated_at', 'pivot', 'id', 'user_id']); // hide pivot table
        return response($user);
    }
}
