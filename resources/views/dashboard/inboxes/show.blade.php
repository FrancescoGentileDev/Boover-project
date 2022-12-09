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

      <form method="POST" action="{{ route('dashboard.inboxes.destroy', $inbox->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
      </form>
    </section>
  </article>

  {{-- @dump($inbox) --}}
@endsection
