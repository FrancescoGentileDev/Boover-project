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
            ->leftJoin(DB::raw('(SELECT user_id, AVG(vote) as avg_vote FROM reviews GROUP BY user_id) as rv1'), 'users.id', '=', 'rv1.user_id')
            ->select('users.id', 'users.name', 'users.lastname', 'users.avatar', 'users.slug', 'users.phone', 'users.presentation', 'users.detailed_description', 'users.birthday_date', 'rv1.avg_vote')
            ->addSelect(DB::raw('IF(sponsor_user.expire_date > NOW(), 1, 0) as is_sponsorized'))
            ->groupBy('users.id', 'users.name', 'users.lastname', 'users.avatar', 'users.slug', 'users.phone', 'users.presentation', 'users.detailed_description', 'users.birthday_date', 'rv1.avg_vote', 'is_sponsorized')
            ->where('is_available', 1)
            ->orderBy('is_sponsorized', 'desc');


        if ($request->has('rating_min')) {
            $users->whereHas('reviews', function ($query) use ($request) {

                $query->select(DB::raw('AVG(vote) as avg_vote'))
                    ->having('avg_vote', '>=', $request->rating_min);
            });
        }
        if ($request->has('rating_max')) {
            $users->whereHas('reviews', function ($query) use ($request) {

                $query->select(DB::raw('AVG(vote) as avg_vote'))
                    ->having('avg_vote', '<=', $request->rating_max);
            });
        }
        $search = explode('-', $request->search);
        if ($request->has('search')) {
            foreach ($search as $param) {
                $users->whereRaw("concat(name, ' ', lastname) like '%" . $param . "%' ");
            }
        }
        if ($request->has('only_sponsor') && $request->only_sponsor == 'true') {
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
        $paginate = 10;
        if ($request->has('max')) {
            $paginate = $request->max;
        }

        $users->leftJoin(DB::raw('(SELECT user_id, AVG(vote) as avg_vote FROM reviews GROUP BY user_id) as rv'), 'users.id', '=', 'rv.user_id');




        $users->withCount('reviews');
        if ($request->has('most_reviewed') && $request->most_reviewed == 'true') {
            $users->orderByDesc('reviews_count');
        } else {
            $users->orderBy('rv1.avg_vote', 'desc');
        }

        //TODO PRIMA I PROFILI SPONSOR

        $users->with('skills');

        $users = $users->paginate($paginate); // hide useless params

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

        return response()->json($users);
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
        if ($request->has('slug')) {
            $user = User::where('slug', $id)->first();
        } else {
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
