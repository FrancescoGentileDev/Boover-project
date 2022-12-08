<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.meta-head')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/backOffice.js') }}"></script>

    <title>{{ $title ?? 'Boover Project' }}</title>
</head>
<body>
    <x-app-header
        :titleHeading="$titleHeading ?? 'Boover'"
    />

    <main>
        @yield('content')
    </main>
</body>
</html>
