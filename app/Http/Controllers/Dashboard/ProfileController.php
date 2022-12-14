<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Skill;
use Illuminate\Http\Request;
use App\User;
use App\models\Sponsor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        //
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $user = $user->makeHidden(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'id']); // hide useless params
        $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        $skills = Skill::all();
        $skills = $skills->makeHidden(['created_at', 'updated_at', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        return view('dashboard.profile.profile', compact('user', 'skills'));
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'name' => 'required | string | max:255 | min:3  ',
            'lastname' => 'required | string | max:255 | min:3 ',
            'presentation' => 'required | string | max:255 | min:3 ',
            'phone' => 'required| numeric| digits_between:10,15| ',
            'detailed_description' => 'required | string | min:3 ',
            'skills_id' => ['required', 'array', 'min:1', 'max:5', 'exists:skills,id'],
            'avatar' => ' file|mimes:jpg,jpeg,png,gif|max:8000',
        ]);
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->presentation = $request->presentation;
        $user->phone = $request->phone;
        $user->detailed_description = $request->detailed_description;
        $user->is_available = '1';

        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            $path = $avatar->move(public_path('avatars'), $filename);

            $user->avatar = asset('/avatars/' . $filename);

        }
        $user->save();
        $user->skills()->sync($request->skills_id);
        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully');
    }
}
