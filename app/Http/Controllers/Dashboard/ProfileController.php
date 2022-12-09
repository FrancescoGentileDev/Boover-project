<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\Sponsor;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        //
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $user = $user->makeHidden(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'id']); // hide useless params
        $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'id', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        return view('dashboard.profile', compact('user'));

    }

    public function updateProfile(Request $request)
    {
        //


    }

    public function sponsor()
    {
        //
        $sponsors = Sponsor::all();
        return view('dashboard.profile.sponsor', compact('sponsors'));
    }

    public function addToSponsor()
    {
        //
    }
}
