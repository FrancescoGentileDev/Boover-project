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
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline" tabindex="0"
                        role="link">Read
                        more</a>

                    <div class="flex items-center">
                        <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                            src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80"
                            alt="avatar">
                        <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200" tabindex="0"
                            role="link">Khatab
                            wedaa</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
