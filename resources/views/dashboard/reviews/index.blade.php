@extends('layouts.app')

@section('content')
    <div class="text-3xl text-red-500 mb-5 pl-5">
        Reviews List:
    </div>

    <ul>
        @foreach ($reviews as $review)
            <div class="mb-4 p-5">
                <div class="mb-1">
                    <div class="text-green-800 text-xl">
                        Review Title:
                    </div>
                    <a href="{{ route('dashboard.reviews', $review->id) }}">{{ $review->title }}</a>
                </div>
                <div class="mb-1">
                    <div class="text-green-800">
                        Author:
                    </div>
                    <a href="#">
                        {{ $review->nickname }}
                    </a>
                </div>
                <div class="mb-1">
                    <div class="text-green-800">
                        Review:
                    </div>
                    <div class="w-auto">
                        {{ $review->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
@endsection
