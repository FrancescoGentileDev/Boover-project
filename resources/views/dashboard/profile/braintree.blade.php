@extends('layouts.app')

@section('head')
{{-- Braintree DropIn Gateway JS --}}
<script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
@endsection

@section('content')

<section class="
    flex
    flex-col
    justify-center
    items-center
    min-h-screen">

    {{-- Info --}}
    <article class="max-w-prose">
        <h2>Sponsorship:</h2>
        <p>By becoming one of our {{ $sponsor->type }} members you will be pushed to our front pages more frequently giving hiring agents the possibility to checkout your profile more often and for more job opportunities to come your way.</p>
    </article>

    {{-- FORM --}}
    <form method="POST" id="payment-form" action="{{ route('dashboard.sponsor.checkout') }}"
        class="
            container
            flex
            flex-col
            items-center
            p-4
            lg:p-8
        "
    >
        @csrf
        <section class="
            max-w-prose
            min-w-full
            md:min-w-[50%]
        ">
            <label for="amount" class="input-wrapper amount-wrapper">
                <div class="flex justify-between">
                    <h3 class="
                        text-xl
                        font-bold
                        text-violet-500
                    ">{{ $sponsor->type }} Sponsorship</h3>
                    <p class="text-2xl"><strong>$ {{ $sponsor->price }}</strong></p>
                </div>
                <input type="hidden" name="sponsor" value="{{ $sponsor->id }}" />
            </label>

            <div class="bt-drop-in-wrapper mt-3">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" value="" />
        <button class="button btn btn-primary mt-4" type="submit">Purchase Sponsorship</button>
    </form>
</section>

<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{ $clientToken }}";

    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      },
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
