@extends('layouts.app')

@section('content')
    <div class="text-3xl text-red-500">
        Reviews List:
    </div>

    <ul>
        @foreach ($reviews as $review)
            <li>
                <a href="{{ route('dashboard.reviews', $review->id) }}">{{ $review->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
