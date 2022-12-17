@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="my-7 px-8 py-4 bg-base-200 rounded-lg shadow-md dark:bg-gray-800 hover:bg-base-300">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-base-content">{{ $review->created_at }}</span>
            </div>

            <div class="mt-2">
                <div class="text-2xl font-bold text-base-content" tabindex="0" role="link">
                    {{ $review->title }}</div>
                <p class="mt-2 text-base-content">
                    {{ $review->description }}</p>
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <div class="font-bold text-base-content" tabindex="0" role="link">
                        Valutation: {{ $review->vote }}</div>
                </div>
                <div class="flex items-center">
                    <div class="font-bold text-base-content" tabindex="0" role="link">
                        {{ $review->nickname }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
