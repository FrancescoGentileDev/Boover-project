<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.meta-head')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- JS --}}
    <script src="{{ asset('js/backOffice.js') }}"></script>

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
