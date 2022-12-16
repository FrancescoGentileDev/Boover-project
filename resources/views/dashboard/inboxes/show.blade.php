@extends('layouts.app', [
    'title' => 'Boover | Inbox',
])

@section('content')
    <article style="padding-top: 10%" class="w-3/4 mx-auto my-7">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-neutral">{{ $inbox->created_at }}</span>
        </div>

        <div class="mt-2">
            <div class="text-2xl font-bold text-neutral" tabindex="0" role="link">Message Title: {{ $inbox->title }}
            </div>
            <p class="text-gray-600"><span class="text-neutral font-semibold">From: </span> {{ $inbox->nickname }}</p>
            <p class="mt-2 text-gray-600"><span class="text-neutral font-semibold">Message: </span>
                {{ $inbox->content }}</p>
        </div>

        <div class="flex items-center justify-between mt-4">
            <div class="text-sm my-4">
                <h4 class="text-neutral font-semibold">Contacts:</h4>

                <p>Phone: {{ $inbox->phone }}</p>
                <p>Email: {{ $inbox->email }}</p>
            </div>
        </div>
        <x-delete-form :destroyRoute="route('dashboard.inboxes.destroy', $inbox->id)" />
    </article>

    {{-- @dump($inbox) --}}
@endsection
