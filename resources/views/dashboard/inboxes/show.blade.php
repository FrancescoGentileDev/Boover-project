@extends('layouts.app', [
    'title' => 'Boover | Inbox',
])

@section('content')
    <div class="py-10">
        <article class="rounded-lg shadow-md w-3/4 mx-auto my-7 px-8 py-4 bg-base-200">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light base-100">{{ $inbox->created_at }}</span>
            </div>

            <div class="mt-2">
                <div class="text-2xl font-bold base-100" tabindex="0" role="link">Titolo del Messaggio:
                    {{ $inbox->title }}
                </div>
                <p><span class="base-100 font-bold">Da: </span> {{ $inbox->nickname }}</p>
                <p class="mt-2"><span class="base-100 font-bold">Messaggio: </span>
                    {{ $inbox->content }}</p>
            </div>

            <div class="flex items-center mt-4">
                <div class="text-sm my-4">
                    <h4 class="base-100 font-bold">Contatti:</h4>

                    <p>Telefono: {{ $inbox->phone }}</p>
                    <p>Email: {{ $inbox->email }}</p>
                </div>
                <div class="pt-7 ml-10">
                    <x-delete-form :destroyRoute="route('dashboard.inboxes.destroy', $inbox->id)" />
                </div>
            </div>
        </article>
        <div class="flex flex-row justify-center gap-x-10">
            <button class="bg-base-200 px-8 py-4 rounded-lg shadow-md hover:bg-base-300 font-bold base-content">
                <a href="{{ route('dashboard.home') }}">HOMEPAGE</a>
            </button>
            <button class="bg-base-200 px-8 py-4 rounded-lg shadow-md hover:bg-base-300 font-bold base-content">
                <a href="{{ route('dashboard.inboxes.index') }}">ELENCO MESSAGGI</a>
            </button>
        </div>
    </div>
@endsection
