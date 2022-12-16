@extends('layouts.app', [
    'title' => 'Boover | Inbox',
])

@section('content')
    <article class="w-3/4 mx-auto my-7">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-600">{{ $inbox->created_at }}</span>
        </div>

        <div class="mt-2">
            <div class="text-2xl font-bold text-gray-700" tabindex="0" role="link">Message Title: {{ $inbox->title }}
            </div>
            <p class="text-gray-600">From: {{ $inbox->nickname }}</p>
            <p class="mt-2 text-gray-600">{{ $inbox->content }}</p>
        </div>

        <div class="flex items-center justify-between mt-4">
            <div class="text-sm text-gray-600 my-4">
                <h4 class="text-base-content">Contacts:</h4>

                <p>Phone: {{ $inbox->phone }}</p>
                <p>Email: {{ $inbox->email }}</p>
            </div>
        </div>
        <x-delete-form :destroyRoute="route('dashboard.inboxes.destroy', $inbox->id)" />
    </article>

    {{-- @dump($inbox) --}}
@endsection
