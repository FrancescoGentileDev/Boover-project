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
        $reviews = Review::all();
        return view('dashboard.reviews.index', compact('reviews'));
    }
}
