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

        $request -> validate([
            'name' => 'required | string | max:255 | min:3  ',
            'lastname' => 'required | string | max:255 | min:3 ',
            'presentation' => 'required | string | max:255 | min:60 ',
            'phone' => 'required| numeric| digits_between:10,15| ',
            'detailed_description' => 'required | string | min:3 ',
            'skills_id' => ['required', 'array', 'min:1', 'max:5', 'exists:skills,id'],
            'avatar' => ' file|mimes:jpg,jpeg,png,gif|max:1024',
        ]);
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $user->make([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'presentation' => $request->presentation,
            'phone' => $request->phone,
            'detailed_description' => $request->detailed_description,
            'is_avaiable' => '1',
        ]);

        if($request->hasFile('avatar')){
            $path = Storage::putFile('uploads/avatars', $request->file('avatar'));
            $user->avatar = asset('storage/' . $path);
        }
        $user->skills()->sync($request->skills_id);
        $user->save();
        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully');
    }
}
