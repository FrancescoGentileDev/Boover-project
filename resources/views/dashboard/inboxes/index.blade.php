@extends('layouts.app', [
    'title' => 'Boover | My Inbox',
])

@section('content')
    <div class="flex flex-row justify-center">
        <div
            class="basis-2/4 text-center my-7 px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg">
            Your Inbox
        </div>
    </div>

    <!-- component -->
    <div class="mb-5">
        {{ $inboxes->links() }}
    </div>

    <ul id="inbox-list" class="w-full md:w-3/4 flex flex-col gap-3 mx-auto mt-4 mb-8">
        @foreach ($inboxes as $inbox)
            <li class="px-5 py-2 bg-base-200 rounded-lg shadow-md dark:bg-gray-800
        hover:bg-base-300">
                <a href="{{ route('dashboard.inboxes.show', $inbox->id) }}">
                    <p class="font-semibold text-xl">{{ $inbox->title }}</p>
                    <p><em class="text-base-content text-sm">From: {{ $inbox->nickname }}</em></p>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
