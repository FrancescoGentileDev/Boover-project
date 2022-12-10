@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font overflow-hidden">

        @if ( Session::has('sponsorError'))
            <h1> Errore{{ Session::has('sponsorError') }} </h1>
        @endif



            {{-- intro --------------------------------------}}
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Sponsorizzazioni</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">Acquista una badge sponsorizzato per farti notare in mezzo a tanti e dare un boost al tuo profilo. Sponsorizzando il tuo profilo comparirai al primo posto nei risultati di ricerca e avrai accesso alla speciale sezione Freelance in evidenza. </p>
                </div>
            </div>
             {{-- intro END --------------------------------------}}

            <div class="flex flex-wrap -m-4 ">

                {{-- sponsors cards loop --------------------------------------}}
                @foreach ( $sponsors as $sponsor_card )
                    <div class="p-4 w-full md:w-1/3 ">

                        <div class="h-full p-6 rounded-lg border-2 flex flex-col bg-slate-600">

                            <h2 class="text-sm tracking-widest title-font mb-1 font-medium"> {{ $sponsor_card->type }} </h2>

                            <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b leading-none"> {{ $sponsor_card->price . '€' }}</h1>


                            <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>In cima ai risultati di ricerca
                            </p>

                             <p class="flex items-center text-gray-600 mb-2">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span> Sezione Freelance in Evidenza
                            </p>

                            <p class="flex items-center text-gray-600 mb-6">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>{{ $sponsor_card->duration . ' ore' }} di boost
                            </p>

                            <form action='{{ route('dashboard.profile.sponsor.store') }}' method="POST" >

                                @csrf

                                <input type="hidden" name="sponsor" value="{{ $sponsor_card -> id }}" />

                                <button onclick="toggleModal()" class="flex items-center mt-auto text-white bg-gray-400 border-0 py-2 px-4 w-full focus:outline-none hover:bg-gray-500 rounded">
                                    Scopri di più
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>

                                </button>

                            </form>


                            <p class="text-xs text-gray-500 mt-3">Dai un boost al tuo profilo.</p>

                        </div>
                    </div>
                @endforeach
                {{-- sponsors cards loop END --------------------------------------}}
            </div>



                <div id="modal" onclick="toggleModal()" class="fixed hidden right-0 top-0 w-[calc(100%-16rem)] translate-x-64 inset-0 bg-gray-500 bg-opacity-75 transition-opacity "></div>





     </section>

     <script>

        let modal = document.getElementById('modal');

        function toggleModal(){
            modal.classList.toggle('hidden');
        }

     </script>
@endsection
