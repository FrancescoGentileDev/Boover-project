<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class guestController extends Controller
{
    //
    public function guest() {
        return view('guest.home');
    }
}
