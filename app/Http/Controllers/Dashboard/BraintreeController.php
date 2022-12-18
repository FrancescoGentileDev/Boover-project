<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}



