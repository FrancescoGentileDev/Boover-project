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
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        // Create Client Token
        $clientToken = $gateway->clientToken()->generate();
        $sponsor = Sponsor::find($request->sponsor);

        // dd($sponsor);

        // Return view containing form for payment
        return view('dashboard.profile.braintree', compact('clientToken', 'gateway', 'sponsor'));
    }

    public function checkout(Request $request) {
        // Create new Gateway
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
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
}



