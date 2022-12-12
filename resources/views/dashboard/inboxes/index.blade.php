@extends('layouts.app',
  [
    'title' => 'Boover | My Inbox',
    'pageTitle' => 'My Inbox',
  ]
)

@section('content')
  <h2 class="text-lg text-center">Your Inbox</h2>

  <ul id="inbox-list" class="w-full md:w-3/4 flex flex-col gap-3 mx-auto mt-4 mb-8">
    @foreach ($inboxes as $inbox)
      <li class="bg-purple-400 p-2 rounded
        hover:bg-purple-300"
      >
        <a href="{{ route('dashboard.inboxes.show', $inbox->id) }}">
          <p>{{ $inbox->title}}</p>
          <p><em class="text-white text-sm">by {{ $inbox->nickname }}</em></p>
        </a>
      </li>
    @endforeach
  </ul>

  {{-- @dump($inboxes) --}}
@endsection
