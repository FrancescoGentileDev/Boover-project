<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Braintree_Transaction;
use Illuminate\Support\Facades\Auth;

class BraintreeController extends Controller
{
    public function token(Request $request) {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('dashboard.profile.braintree', compact('clientToken', 'gateway'));
    }

    public function process(Request $request) {
        $payload = $request->input('payload', false);
        $nonce = $payload->nonce;

        $status = Braintree_Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        return response()->json($status);
    }

    public function checkout(Request $request) {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $user = User::find(Auth::id());
        // dd($user);

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user->name,
                'lastName' => $user->lastname,
                'email' => $user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // dd($result);

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);

            // return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
            return 'Transaction Successful' . $transaction->id;
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}



