<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class redirects extends Controller
{
    //
    public function redirect() {
        return redirect('/404');
    }
}
