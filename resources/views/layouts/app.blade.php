<!DOCTYPE html>
<html data-theme="{{ Auth::user()->theme_preference }}" lang="en">

<head>
    @include('layouts.partials.meta-head')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- JS --}}
    <script src="{{ asset('js/backOffice.js') }}"></script>

    @yield('head')

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>{{ $title ?? 'Boover Project' }}</title>
</head>


<body>

    <div id="sidebar"
        class="flex flex-col w-48 md:w-64 px-4 py-8 border-r bg-base-300 fixed h-screen z-50 transition-all -left-48 duration-200 md:left-0">
        <button id="button-sidebar " class=" md:hidden absolute top-0 left-48" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars text-3xl m-4"></i>
        </button>
        <a href="/">
            <div class="invert flex flex-row justify-center items-center">
                <svg class="w-5/6" id="Livello_1" data-name="Livello 1" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 810.64 191.46" class="">
                    <path id="b"
                        d="M70.42,86.61c20,0,35.72,14.9,35.72,34.44s-15.42,34.43-35.72,34.43c-11.31,0-21.59-3.85-28.79-10.53V97.4C49.09,90.21,58.85,86.61,70.42,86.61ZM147,121.05C147,82,116.42,51.14,77.61,51.14a61.69,61.69,0,0,0-36,11.31V0L0,9v179.9H41.12v-7.71a68.13,68.13,0,0,0,35.21,9.51C115.91,190.69,147,160.11,147,121.05Z"
                        style="" class="nav0 nav0-text" />
                    <path id="o_1"
                        d="M210.23,155.48c-18.77,0-33.16-15.16-33.16-34.43,0-19.54,14.65-34.7,33.16-34.7s33.15,15.16,33.15,34.7C243.38,140.32,229,155.48,210.23,155.48Zm-73.76-34.43c0,39.57,32.38,70.41,73.76,70.41S284,160.62,284,121.05,251.6,50.37,210.23,50.37,136.47,81.47,136.47,121.05Z"
                        style="" class="nav0 nav0-text" />
                    <path id="o_2"
                        d="M347.21,155.48c-18.76,0-33.16-15.16-33.16-34.43,0-19.54,14.65-34.7,33.16-34.7s33.15,15.16,33.15,34.7C380.36,140.32,366,155.48,347.21,155.48Zm-73.76-34.43c0,39.57,32.38,70.41,73.76,70.41S421,160.62,421,121.05s-32.39-70.68-73.76-70.68S273.45,81.47,273.45,121.05Z"
                        style="" class="nav0 nav0-text" />
                    <polygon id="v"
                        points="454.89 188.9 495.5 188.9 553.58 52.94 509.37 52.94 475.71 136.21 442.04 52.94 396.81 52.94 454.89 188.9"
                        style="" class="nav0 nav0-text" />
                    <path id="e"
                        d="M599.58,84.55c13.37,0,24.16,8.48,28.53,21.59h-56.8C575.42,92.52,585.7,84.55,599.58,84.55Zm60.65,86.35-27.5-24.41c-6.42,6.68-15.93,10.28-27.24,10.28-15.67,0-28-8.74-33.41-21.59H669V124.9c0-42.92-28.78-74.27-68.62-74.27s-70.93,30.84-70.93,70.42,32.38,70.41,74,70.41C626.05,191.46,643,185.3,660.23,170.9Z"
                        style="" class="nav0 nav0-text" />
                    <path id="r"
                        d="M663.32,188.89H705V102.54a37.1,37.1,0,0,1,31.61-17.22,47.69,47.69,0,0,1,19.79,4.12V53.2c-3.6-2.31-7.71-3.09-15.68-3.34A44.89,44.89,0,0,0,705,66.56V52.94H663.32Z"
                        style="" class="nav0 nav0-text" />
                    <circle id="green_point" cx="782.19" cy="163.01" r="28.45" style="fill: #39b772" />
                </svg>
            </div>
        </a>

        <div class="flex flex-col items-center mt-6 -mx-2">
            @if (Auth::user()->avatar)
                <img class="object-cover w-24 h-24 mx-2 rounded-full" src="{{ Auth::user()->avatar }}" alt="avatar">
            @endif
            <h4 class="mx-2 mt-2 font-medium base-100">{{ Auth::user()->name }}
                {{ Auth::user()->lastname }}</h4>
            <p class="mx-2 mt-1 text-sm font-medium base-300">{{ Auth::user()->email }}</p>
        </div>

        <div class="flex flex-col justify-between flex-1 mt-6 relative">
            <nav class="">
                <a id="Home"
                    class="flex items-center px-4 py-2 transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100
            @if (Route::currentRouteName() == 'dashboard.home') active-item base-100 @endif"
                    href="{{ route('dashboard.home') }}">
                    <i class="fa-solid fa-chart-simple"></i>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

                <a id='Profile'
                    class="
            @if (Route::currentRouteName() == 'dashboard.profile') active-item base-100 @endif
            flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                    href="{{ route('dashboard.profile') }}">
                    <i class="fa-solid fa-user"></i>

                    <span class="mx-4 font-medium">Profile</span>
                </a>

                <a id='reviews'
                    class="
            @if (Route::currentRouteName() == 'dashboard.reviews.index') active-item base-100
            @elseif (Route::currentRouteName() == 'dashboard.reviews.show') active-item base-100 @endif
            flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                    href="{{ route('dashboard.reviews.index') }}">
                    <i class="fa-solid fa-star"></i>

                    <span class="mx-4 font-medium">Reviews</span>
                </a>

                <a id="Inboxes"
                    class="
            @if (Route::currentRouteName() == 'dashboard.inboxes.index') active-item base-100
            @elseif (Route::currentRouteName() == 'dashboard.inboxes.show') active-item base-100 @endif
            flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                    href="{{ route('dashboard.inboxes.index') }}">
                    <i class="fa-solid fa-inbox"></i>

                    <span class="mx-4 font-medium">Inboxes</span>
                </a>

                <a id="Sponsorship"
                    class="
             @if (Route::currentRouteName() == 'dashboard.sponsor') active-item base-100 @endif
             flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                    href="{{ route('dashboard.sponsor') }}">
                    <i class="fa-solid fa-medal"></i>

                    <span class="mx-4 font-medium">Sponsorship</span>
                </a>

                <a id="Settings"
                    class="
            @if (Route::currentRouteName() == 'dashboard.settings') active-item base-100 @endif
            flex items-center px-4 py-2 mt-5 transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                    href="{{ route('dashboard.settings') }}">
                    <i class="fa-solid fa-gear"></i>

                    <span class="mx-4 font-medium">Settings</span>
                </a>

                <div class="absolute bottom-8">
                    <a id="Homepage"
                        class="flex items-center mb-5 px-4 py-2 rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                        href="/">
                        <i class="fa-solid fa-home"></i>

                        <span class="mx-4 font-medium">Homepage</span>
                    </a>
                </div>

                <button
                    class="absolute bottom-0 left-0 flex items-center self-end px-4 py-2 mt-5 w-full transition-colors duration-300 transform rounded-lg base-content dashboard-item base-100 hover:bg-base-100 hover:base-100"
                    onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="mx-4 font-medium">Logout</span>
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
    </div>

    <div class="px-8 md:px-0 container mx-auto md:pl-64">
        @yield('content')
    </div>


    <script>
        let sidebar = document.getElementById('sidebar');

        function toggleSidebar() {
            if (sidebar.classList.contains('-left-48')) {
                sidebar.classList.remove('-left-48');
                sidebar.classList.add('left-0');
            } else {
                sidebar.classList.remove('left-0');
                sidebar.classList.add('-left-48');
            }


        }
    </script>
</body>
@yield('styles')

</html>
