@extends('layouts.app', [
    'title' => 'Boover | Inbox',
])

@section('content')
    <div class="py-10">
        <article class="rounded-lg shadow-md w-3/4 mx-auto my-7 px-8 py-4 bg-base-200">
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

            <div class="flex items-center mt-4">
                <div class="text-sm my-4">
                    <h4 class="text-neutral font-semibold">Contacts:</h4>

                    <p>Phone: {{ $inbox->phone }}</p>
                    <p>Email: {{ $inbox->email }}</p>
                </div>
                <div class="pt-7 ml-10">
                    <x-delete-form :destroyRoute="route('dashboard.inboxes.destroy', $inbox->id)" />
                </div>
            </div>
        </article>
        <div class="flex flex-row justify-center gap-x-10">
            <button class="bg-base-200 px-8 py-4 rounded-lg shadow-md hover:bg-base-300 font-semibold text-base-content">
                <a href="{{ route('dashboard.home') }}">HOMEPAGE</a>
            </button>
            <button class="bg-base-200 px-8 py-4 rounded-lg shadow-md hover:bg-base-300 font-semibold text-base-content">
                <a href="{{ route('dashboard.reviews.index') }}">REVIEWS LIST</a>
            </button>
        </div>
    </div>
@endsection
