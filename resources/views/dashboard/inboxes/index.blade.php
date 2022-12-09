@extends('layouts.app-emg',
  [
    'title' => 'Boover | My Inbox',
    'pageTitle' => 'My Inbox',
  ]
)

@section('content')
  <h2>Your Inbox</h2>

  <ul>
    @foreach ($inboxes as $inbox)
      <li>
        <p><a href="{{ route('dashboard.inboxes.show', $inbox->id) }}">{{ $inbox->title}}</a> <em>by {{ $inbox->nickname }}</em></p>
      </li>
    @endforeach
  </ul>

  {{-- @dump($inboxes) --}}
@endsection
