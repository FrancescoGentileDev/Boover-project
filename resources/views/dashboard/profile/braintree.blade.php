@extends('layouts.app')

@section('head')
{{-- Braintree DropIn Gateway JS --}}
<script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
@endsection

@section('content')

{{-- <form action="/payment/process" id="payment-form" method="POST">
    @csrf
    <input type="hidden" name="clientToken" id="clientToken" value="{{ $clientToken }}">
    <input type="hidden" id="nonce" name="payment_method_nonce" />

    <div id="dropin-container"></div>
    <button id="submit-button">Request payment method</button>
</form> --}}

<form method="post" id="payment-form" action="{{ route('dashboard.braintree.checkout') }}">
    @csrf
    <section>
        <label for="amount">
            <span class="input-label">Amount</span>
            <div class="input-wrapper amount-wrapper">
                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
            </div>
        </label>

        <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
        </div>
    </section>

    <input id="nonce" name="payment_method_nonce" type="hidden" />
    <button class="button" type="submit"><span>Test Transaction</span></button>
</form>

{{-- @dump('Auth Debug')
@dump($clientToken)
@dump($gateway) --}}

<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{ $clientToken }}";
    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }
          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
</script>

@endsection
