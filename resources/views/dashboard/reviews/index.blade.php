@extends('layouts.app')

@section('content')
    <div class="flex flex-row justify-center">
        <div
            class="basis-full text-center my-7 px-6 py-2 font-medium tracking-wide capitalize transition-colors duration-300 transform bg-base-300 base-100 rounded-lg">
            Elenco delle tue Recensioni
        </div>
    </div>


    <div class="mb-5">
        {{ $reviews->links() }}
    </div>

    <div>
        @foreach ($reviews as $review)
            <div class="w-full my-7 px-8 py-4 bg-base-200 rounded-lg shadow-md hover:bg-base-300">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-light text-base-content">{{ $review->created_at }}</span>
                </div>

                <div class="mt-2">
                    <div class="text-2xl font-bold text-base-content hover:underline" tabindex="0" role="link">
                        <a href="{{ route('dashboard.reviews.show', $review->id) }}">{{ $review->title }}</a>
                    </div>
                    <p class="mt-2 text-base-content">
                        {{ $review->description }}</p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <div class="font-bold text-base-content" tabindex="0" role="link">
                            Voto: {{ $review->vote }}</div>
                    </div>
                    <div class="flex items-center">
                        <div class="font-bold text-base-content" tabindex="0" role="link">
                            {{ $review->nickname }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
