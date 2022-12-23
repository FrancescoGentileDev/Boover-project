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
    public function SendReview(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'nickname' => ['required', 'string', 'max:32'],
            'title' => [ 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'vote' => ['required', 'integer', 'min:1', 'max:5'],
        ]);
        //

        $inbox = new Review();
        $inbox->fill($request->all());
        $inbox->save();
        return response($inbox, 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getReview($id)
    {
        //
        $reviews = Review::where('user_id', $id)->paginate(10, ['id', 'nickname', 'title', 'description', 'image', 'vote', 'created_at']);

        return response($reviews);
    }

}
