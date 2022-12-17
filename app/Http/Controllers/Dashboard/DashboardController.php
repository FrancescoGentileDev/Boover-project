<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\models\Review;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $logged = Auth::user()->id;
        $user = User::find($logged);

        // reviews and inboxes
        $totalReviews = $user->reviews()->count();
        $totalInboxes = $user->inboxes()->count();

        // if is sponsorised
        $isSponsor = $user->sponsors()->find('user_id');

        // vote average
        $average = $user->reviews()->avg('vote');

        return view('dashboard.index', compact('user', 'totalReviews', 'totalInboxes', 'isSponsor', 'average'));
    }
}
