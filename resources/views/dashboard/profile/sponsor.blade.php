@extends('layouts.app')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')


    {{-- @if ( Session::has('sponsorError'))
    <h1> Errore{{ Session::has('sponsorError') }} </h1>
    @endif --}}

    @if ($isUserSponsorized)

        {{-- Vista per utenti con sponsorizzazione attiva --}}
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Hai una sponsorship attiva</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">Al momento sei un utente sponsorizzato. Godi dei tuoi vantaggi esclusivi per tutta la durata del boost!</p>
                </div>
            </div>
            @include('layouts.partials.sponsor.countdown');
        </section>
    @else

        {{-- Vista per utenti senza sponsorizzazione --}}
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Sponsorizzazioni</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">Acquista una badge sponsorizzato per farti notare in mezzo a tanti e dare un boost al tuo profilo. Sponsorizzando il tuo profilo comparirai al primo posto nei risultati di ricerca e avrai accesso alla speciale sezione Freelance in evidenza. </p>
                </div>
            </div>

            <div class="flex flex-wrap -m-4 ">
                {{-- sponsors cards loop --------------------------------------}}
                @foreach ( $sponsors as $sponsor_card )
                    @include('layouts.partials.sponsor.card')
                @endforeach

            </div>

        </section>

    @endif


    <script>
    // Data di scadenza inviata da sponsorController
    let = countDownDate = new Date({!! json_encode($expireDate, JSON_HEX_TAG)!!}).getTime();


    // Run myfunc every second
    let = myfunc = setInterval(function() {

    let = now = new Date().getTime();
    let = timeleft = countDownDate - now;

    // Calculating the days, hours, minutes and seconds left
    let = days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
    let = hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let = minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    let = seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

    // Result is output to the specific element
    document.getElementById("days").style = `--value:${days}`
    document.getElementById("hours").style = `--value:${hours}`
    document.getElementById("mins").style = `--value:${minutes}`
    document.getElementById("secs").style = `--value:${seconds}`

    // Display the message when countdown is over
    if (timeleft < 0) {
        clearInterval(myfunc);
        document.getElementById("days").innerHTML = ""
        document.getElementById("hours").innerHTML = ""
        document.getElementById("mins").innerHTML = ""
        document.getElementById("secs").innerHTML = ""
        document.getElementById("end").innerHTML = "Sponsorizzazione scaduta!";
    }
    }, 1000);
    </script>

@endsection
