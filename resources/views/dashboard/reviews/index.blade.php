@extends('layouts.app')

@section('content')
    <div class="text-3xl text-red-500 py-5 pl-5">
        Reviews List:
    </div>

    <div class="mb-5">
        {{ $reviews->links() }}
    </div>

    <div class="px-5">
        @foreach ($reviews as $review)
            <div class="max-w-2xl px-8 py-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
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
                        <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200" tabindex="0"
                            role="link">{{ $review->nickname }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
