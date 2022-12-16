<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    //
    function sendMessage(Request $request) {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'nickname' => ['required', 'string', 'max:32'],
            'title' => [ 'string', 'max:50'],
            'content' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['max:15', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'nullable'],
        ]);

        //
        $review = new Inbox();
        $review->make([
            'user_id' => $request->user_id,
            'nickname' => $request->nickname,
            'title' => $request->title,
            'content' => $request->content,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $review->save();
        return response($review, 200);

    }
}
