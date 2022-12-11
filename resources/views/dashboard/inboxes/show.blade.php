@extends('layouts.app-emg',
  [
    'title' => 'Boover | My Inbox',
    'pageTitle' => 'My Inbox',
  ]
)

@section('content')
  <article>
    <h3>{{ $inbox->title }}</h3>
    <p>by {{ $inbox->nickname }}</p>
    <p>{{ $inbox->content }}</p>

    <section>
      <h4>Contacts</h4>

      <p>Phone: {{ $inbox->phone }}</p>
      <p>Email: {{ $inbox->email }}</p>

      <x-delete-form :destroyRoute="route('dashboard.inboxes.destroy', $inbox->id)" />

    </section>
  </article>

  {{-- @dump($inbox) --}}
@endsection
