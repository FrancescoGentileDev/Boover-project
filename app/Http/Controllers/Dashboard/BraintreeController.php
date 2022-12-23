<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\models\Sponsor;
use Illuminate\Http\Request;
use Braintree_Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BraintreeController extends Controller
{
    public function token(Request $request) {
        // Create new Gateway
        $gateway = new \Braintree\Gateway([
            'environment' => "sandbox",
            'merchantId' =>"5b7rjcxmb2pdc9fw",
            'publicKey' => "xbjxy2qggmb5mrr6",
            'privateKey' => "6c30322db62ebd20aed04b69808e146d",
        ]);

        // Create Client Token
        $clientToken = $gateway->clientToken()->generate();
        $sponsor = Sponsor::find($request->sponsor);


        // Return view containing form for payment
        return view('dashboard.profile.braintree', compact('clientToken', 'gateway', 'sponsor'));
    }

    public function checkout(Request $request) {
        // Create new Gateway
        $gateway = new \Braintree\Gateway([
            'environment' => "sandbox",
            'merchantId' =>"5b7rjcxmb2pdc9fw",
            'publicKey' => "xbjxy2qggmb5mrr6",
            'privateKey' => "6c30322db62ebd20aed04b69808e146d",
        ]);
        // Find current user who is making the transaction
        $user = User::find(Auth::id());

        // Sponsor
        $sponsor = Sponsor::find($request->sponsor);

        // Get amout and nonce
        $amount = $sponsor->price;
        $nonce = $request->payment_method_nonce;

        // Create the transaction
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user->name,
                'lastName' => $user->lastname,
                'email' => $user->email,
                'id' => $user->id,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);


        if ($result->success) {
            // return 'Transaction Successful' . $result->transaction->id;
            $sponsorRecord = DB::table('sponsor_user')->where( 'user_id','=', $user->id )->orderByDesc('created_at')->first();
            if ( $sponsorRecord == null ||  $sponsorRecord->expire_date < date('Y-m-d H:i:s') ) {
                //
                $request->validate([
                    'sponsor' => ['required', 'exists:sponsors,id']
                ]);

                $sponsor = Sponsor::find($request->sponsor);
                $newDate = date("Y-m-d H:i:s", strtotime("+{$sponsor->duration} hours"));
                $user->sponsors()->attach($sponsor->id, ['expire_date' => $newDate, 'created_at' => date('Y-m-d H:i:s')]);

                return redirect()->route('dashboard.profile.sponsor.store')->with('success','Sponsorizzazione aggiunta con successo!');

                //
            } elseif ( $sponsorRecord->expire_date > date('Y-m-d H:i:s') ) {
            //
                return redirect()->route('dashboard.profile.sponsor.store')->with('error','Sponsorizzazione ');
            }
        }
        else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return 'An error occurred with the message: '.$result->message;
        }
    }

    public function transactionDetails() {
        //
    }
}



