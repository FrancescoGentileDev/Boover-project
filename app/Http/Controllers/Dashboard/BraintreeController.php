<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\models\Sponsor;
use Illuminate\Http\Request;
use Braintree_Transaction;
use Illuminate\Support\Facades\Auth;

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

        // Get amout and nonce
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        // Find current user who is making the transaction
        $user = User::find(Auth::id());

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
            return 'Transaction Successful' . $result->transaction->id;
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



