<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\Sponsor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{

    public function sponsor()
    {
        //
        $sponsors = Sponsor::all();
        $logged = Auth::user()->id;
        $user = User::find($logged);
        $expireDate='';

        $sponsorRecord = DB::table('sponsor_user')->where( 'user_id','=', $user->id )->orderByDesc('created_at')->first() ;


         if ( $sponsorRecord == null ||  $sponsorRecord->expire_date < date('Y-m-d H:i:s') ) {
            //
            $isUserSponsorized = false;
            //
         } elseif ( $sponsorRecord->expire_date > date('Y-m-d H:i:s') ) {
            //
            $isUserSponsorized = true;
            $expireDate = $sponsorRecord->expire_date;
            //
         }

         /* dd($isUserSponsorized); */

        return view('dashboard.profile.sponsor', compact('sponsors', 'isUserSponsorized','expireDate'));
    }

    public function addToSponsor(Request $request)
    {
        //
        $logged = Auth::user()->id;
        $user = User::find($logged);

        $request->validate([
            'sponsor' => ['required', 'exists:sponsors,id']
        ]);

        $sponsor = Sponsor::find($request->sponsor);

        $newDate = date("Y-m-d H:i:s", strtotime("+{$sponsor->duration} hours"));
        $user->sponsors()->attach($sponsor->id, ['expire_date' => $newDate, 'created_at' => date('Y-m-d H:i:s')]);

        return redirect()->route('dashboard.profile.sponsor.store')->with('success','Sponsorizzazione aggiunta con successo!');
    }



}
