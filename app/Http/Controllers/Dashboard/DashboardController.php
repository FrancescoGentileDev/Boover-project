<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\models\Review;
use App\models\Inbox;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $reviews = Review::where('user_id', $logged)->orderBy('created_at', 'desc')->paginate(5);
        $inboxes = Inbox::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);

        // reviews and inboxes
        $totalReviews = $user->reviews()->count();
        $totalInboxes = $user->inboxes()->count();

        // average vote per month
        $averages_per_month = [];
        for ($i = 1; $i <= 12; $i++) {
            $average_month = $user->reviews()->whereMonth('created_at', $i)->avg('vote');
            $averages_per_month[] = $average_month;
        };
        //dd($averages_per_month);

        // if is sponsorised
        $isSponsor = $user->sponsors()->find('user_id');

        // vote average
        $average = $user->reviews()->avg('vote');

        return view('dashboard.index', compact('user', 'totalReviews', 'totalInboxes', 'isSponsor', 'average', 'reviews', 'inboxes', 'averages_per_month'));
    }
}
