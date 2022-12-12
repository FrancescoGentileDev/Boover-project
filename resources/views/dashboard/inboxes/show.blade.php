@extends('layouts.app',
  [
    'title' => 'Boover | My Inbox',
    'pageTitle' => 'My Inbox',
  ]
)

@section('content')
  <article class="w-3/4 mx-auto my-5">
    <h3 class="text-lg text-purple-500">{{ $inbox->title }}</h3>
    <p class="text-gray-600">by {{ $inbox->nickname }}</p>
    <p class="my-5">{{ $inbox->content }}</p>

    <section class="text-sm text-gray-600 my-4">
      <h4 class="text-purple-400">Contacts</h4>

      <p>Phone: {{ $inbox->phone }}</p>
      <p>Email: {{ $inbox->email }}</p>
    </section>

    <x-delete-form :destroyRoute="route('dashboard.inboxes.destroy', $inbox->id)" />
  </article>

  {{-- @dump($inbox) --}}
@endsection
