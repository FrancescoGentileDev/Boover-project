<div class="p-4 w-full md:w-1/3 ">

    <div
        class="h-full p-6 rounded-lg border-4 flex flex-col relative @if ($sponsor_card->type == 'Silver') border-indigo-500 @endif">

        @if ($sponsor_card->type == 'Silver')
            <span
                class="bg-indigo-500 base-100 px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">POPULAR</span>
        @endif

        <h2 class="text-sm tracking-widest title-font mb-1 font-medium"> {{ $sponsor_card->type }} </h2>
        <h1 class="text-5xl base-100 pb-4 mb-4 border-b leading-none"> {{ $sponsor_card->price . '€' }}</h1>


        <p class="flex items-center mb-2">
            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-base-300 rounded-full flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    class="w-3 h-3" viewBox="0 0 24 24">
                    <path d="M20 6L9 17l-5-5"></path>
                </svg>
            </span>In cima ai risultati di ricerca
        </p>

        <p class="flex items-center mb-2">
            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-base-300 rounded-full flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                    <path d="M20 6L9 17l-5-5"></path>
                </svg>
            </span> Sezione Freelance in Evidenza
        </p>

        <p class="flex items-center mb-6">
            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-base-300 rounded-full flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                    <path d="M20 6L9 17l-5-5"></path>
                </svg>
            </span>{{ $sponsor_card->duration . ' ore' }} di boost
        </p>

        <form action='{{ route('dashboard.sponsor.payment') }}' method="POST">

            @csrf

            <input type="hidden" name="sponsor" value="{{ $sponsor_card->id }}" />

            <button onclick="toggleModal()"
                class="flex items-center mt-auto base-100 bg-base-300 border-0 py-2 px-4 w-full focus:outline-none hover:bg-base-200 rounded @if ($sponsor_card->type == 'Silver') bg-indigo-500 hover:bg-indigo-600 @endif">
                Acquista
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>

            </button>

        </form>

        <p class="text-xs text-gray-500 mt-3">Dai un boost al tuo profilo.</p>

    </div>
</div>
