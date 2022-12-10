<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\Sponsor;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{

    public function sponsor()
    {
        //
        $user = Auth::user();
        $sponsors = Sponsor::all();

        return view('dashboard.profile.sponsor', compact('sponsors'));
    }

    public function addToSponsor(Request $request)
    {
        //
        dd($request->all());
    }


}
