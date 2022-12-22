@extends('layouts.app', [
    'title' => 'Boover | My Inbox',
])

@section('content')
    <div class="flex flex-row justify-center">
        <div
            class="basis-full text-center my-7 px-6 py-2 font-medium tracking-wide capitalize transition-colors duration-300 transform bg-base-300 base-100 rounded-lg">
            I tuoi Messaggi
        </div>
    </div>

    <!-- component -->
    <div class="mb-5">
        {{ $inboxes->links() }}
    </div>

    <ul id="inbox-list" class="flex flex-col gap-3 mx-auto mt-4 mb-8">
        @foreach ($inboxes as $inbox)
            <li class="w-full px-5 py-2 bg-base-200 rounded-lg shadow-md
        hover:bg-base-300">
                <a href="{{ route('dashboard.inboxes.show', $inbox->id) }}">
                    <p class="font-semibold text-xl">{{ $inbox->title }}</p>
                    <p><em class="text-base-content text-sm">Da: {{ $inbox->nickname }}</em></p>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
