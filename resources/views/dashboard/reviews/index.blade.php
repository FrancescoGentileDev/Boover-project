@extends('layouts.app')

@section('content')
    <div class="flex flex-row justify-center">
        <div
            class="my-7 px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg">
            Your Reviews List
        </div>
    </div>


    <div class="mb-5">
        {{ $reviews->links() }}
    </div>

    <div class="px-5">
        @foreach ($reviews as $review)
            <div class="my-7 px-8 py-4 bg-base-200 rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $review->created_at }}</span>
                </div>

                <div class="mt-2">
                    <a href="#"
                        class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline"
                        tabindex="0" role="link">{{ $review->title }}</a>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        {{ $review->description }}</p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <div class="font-bold text-gray-700 dark:text-gray-200" tabindex="0" role="link">
                            Valutation: {{ $review->vote }}</div>
                    </div>
                    <div class="flex items-center">
                        <div class="font-bold text-gray-700 dark:text-gray-200" tabindex="0" role="link">
                            {{ $review->nickname }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
