<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Review;

class ReviewController extends Controller
{
    //
    public function index()
    {
        //
        //Review::getPaginator()->setCurrentPage($page_num);
        $reviews = Review::paginate(10);
        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function showReview(Review $review)
    {
        //
        return view('dashboard.reviews.show', compact('review'));
    }
}
