<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Skill;
use Illuminate\Http\Request;
use App\User;
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
        $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        $skills = Skill::all();
        $skills = $skills->makeHidden(['created_at', 'updated_at', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        return view('dashboard.profile', compact('user', 'skills'));

    }

    public function updateProfile(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'lastname' => 'required',
            'presentation' => 'required',
            'phone' => 'required| numeric| digits_between:10,15| ',
            'detailed_description' => 'required',
            'skills_id' => ['required', 'array', 'min:1', 'max:5', 'exists:skills,id'],
        ]);
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->presentation = $request->presentation;
        $user->phone = $request->phone;
        $user->detailed_description = $request->detailed_description;
        $user->skills()->sync($request->skills_id);
        $user->save();
        return redirect()->route('dashboard.profile');
    }
}
