@extends('layouts.app')

@section('head')
    {{-- Braintree DropIn Gateway JS --}}
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
            <h2 class="text-2xl font-semibold">Sponsorizzazione:</h2>
            <p>Diventando un membro {{ $sponsor->type }} comparirai nelle riceche in Homepage più frequentemente
                dando la possibilità ai recruiter di visualizzare il tuo profilo più spesso e quindi ottenere
                maggiori proposte di lavoro.</p>
        </article>
        {{ $selectedCard = false }}
        {{-- FORM --}}
        <form method="POST" id="payment-form" action="{{ route('dashboard.sponsor.checkout') }}"
            class="
            container
            flex
            flex-col
            items-center
            p-4
            lg:p-8
        ">
            @csrf
            <section class="
            max-w-prose
            min-w-full
            md:min-w-[50%]
        ">
                <label for="amount" class="input-wrapper amount-wrapper">
                    <div class="flex justify-between">
                        <h3
                            class="
                        text-xl
                        font-bold
                        text-violet-500
                    ">
                            {{ $sponsor->type }} Sponsorship</h3>
                        <p class="text-2xl"><strong>$ {{ $sponsor->price }}</strong></p>
                    </div>
                    <input type="hidden" name="sponsor" value="{{ $sponsor->id }}" />
                </label>

                <div class="bt-drop-in-wrapper mt-3">
                    <div id="bt-dropin"></div>
                </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" value="" />
            <div id="selectCard" class="btn btn-primary my-3" style="display:none"> SELEZIONA CARTA </div>
            <button id="formSubmitButton" class="btn btn-primary my-3 hidden" hidden type="submit">PAGA</button>

        </form>
    </section>




    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $clientToken }}";
        const button = document.getElementById('formSubmitButton');
        const selectCard = document.getElementById('selectCard');
        // import braintree from 'braintree-web-drop-in';
        braintree.dropin.create({
            authorization: client_token,
            container: '#bt-dropin',
            paypal: {
                flow: 'vault'
            },
        }, (createErr, instance) => {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }

            instance.on('paymentMethodRequestable', (obj) => {

                if (obj.paymentMethodIsSelected) {
                    selectCard.style.display = 'none';
                    button.style.display = 'inline-flex';
                } else {
                    selectCard.style.display = 'inline-flex';
                    button.style.display = 'none';
                }

            })
            document.getElementById('selectCard').addEventListener('click', () => {
                instance.requestPaymentMethod((err, payload) => {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    button.style.display = 'inline-flex';
                    selectCard.style.display = 'none';
                    console.log('ciao')
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                        button.setAttribute('disabled', "");
                        button.innerHTML = 'Pagamento in corso...';
                    });
                });
            })


        });
    </script>
@endsection
