<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $totalReviews = $user->reviews()->count();
        $totalInboxes = $user->inboxes()->count();
        $isSponsor = $user->sponsors()->find('user_id');
        return view('dashboard.index', compact('user', 'totalReviews', 'totalInboxes', 'isSponsor'));
    }
}
