<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use App\models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function index()
    {
        //
        $logged = Auth::user()->id;

        $reviews = Review::where('user_id', $logged)->paginate(10);       
        
        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function showReview(Review $review)
    {
        //
        return view('dashboard.reviews.show', compact('review'));
    }
}
