@extends('layouts.app')

@section('content')
    <div class="text-3xl text-red-500 mb-5 pl-5">
        Reviews List:
    </div>

    <div class="px-5">
        @foreach ($reviews as $review)
            <div class="mb-4 p-5 border-2">
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
                    <div>
                        <span>Vote: </span> <span>{{ $review->vote }}</span><span> | rilasciata il:
                        </span><span>{{ $review->created_at }}</span>
                    </div>
                    <div class="w-auto">
                        {{ $review->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
