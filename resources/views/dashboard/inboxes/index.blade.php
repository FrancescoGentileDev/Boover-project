@extends('layouts.app-emg',
  [
    'title' => 'Boover | My Inbox',
    'pageTitle' => 'My Inbox',
  ]
)

@section('content')
  {{-- <h2>Your Inbox</h2>
  @foreach ($inboxes as $inbox)
    <article>
      <h3>{{ $inbox.title }}</h3>
      <p>by {{ $inbox.nickname }}</p>


    </article>
  @endforeach --}}


  @dump($inboxes)
@endsection
