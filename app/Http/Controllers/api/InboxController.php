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

        $inbox = new Inbox();
        $inbox->fill($request->all());
        $inbox->save();
        return response($inbox, 200);

    }
}
