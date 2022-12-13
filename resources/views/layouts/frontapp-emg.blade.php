<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  {{-- Meta Info --}}
  @include('layouts.partials.meta-head')

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  {{-- JS --}}
  <script src="{{ mix('js/app.js') }}" defer></script>

  {{-- Icon and Title (Browser Bar Display) --}}
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>{{ $title ?? 'Boover Project' }}</title>
</head>
<body>
  <x-app-header
    :pageTitle="$pageTitle ?? 'Boover'"
  />

  <div id="app">
    <main>
      @yield('content')
    </main>

    {{-- Footer --}}
  </div>
</body>
</html>
