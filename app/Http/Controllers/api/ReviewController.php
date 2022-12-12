<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'nickname' => ['required', 'string', 'max:32'],
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'vote' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        //
        $review = new Review();
        $review->make([
            'user_id' => $request->user_id,
            'nickname' => $request->nickname,
            'title' => $request->title,
            'description' => $request->description,
            'vote' => $request->vote,
        ]);
        if($request->hasFile('image')){
            $path = Storage::putFile('uploads/reviews', $request->file('image'));
            $review->image = asset('storage/' . $path);
        }
        $review->save();
        return response($review);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reviews = Review::where('user_id', $id)->paginate(10, ['id', 'nickname', 'title', 'description', 'image', 'vote', 'created_at']);

        return response($reviews);
    }

}
