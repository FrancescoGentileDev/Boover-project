<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('layouts.partials.meta-head')

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  {{-- JS --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/backOffice.js') }}" defer></script>


  <title>{{ $title ?? 'Boover Project' }}</title>
</head>
<body>
  <x-app-header
    :pageTitle="$pageTitle ?? 'Boover'"
  />

  <main>
    @yield('content')
  </main>
</body>
</html>
