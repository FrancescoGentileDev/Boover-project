<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    //
    public function switch(Request $request)
    {
        //
        $theme_mode = $request->theme ? 'dark' : 'light';
        $user = User::find(Auth::user()->id);
        $user->theme_preference = $theme_mode;
        $user->save();
        return redirect()->back();
    }
}
