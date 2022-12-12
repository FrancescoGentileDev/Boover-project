<!DOCTYPE html>
<html data-theme="light" lang="en">

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
        class="flex flex-col w-48 md:w-64 px-4 py-8 bg-white border-r dark:bg-gray-900 dark:border-gray-700 fixed h-screen z-50 transition-all -left-48 duration-200 md:left-0">
        <button id="button-sidebar " class=" md:hidden absolute top-0 left-48" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars text-3xl m-4"></i>
        </button>
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">Boover!</h2>

        <div class="flex flex-col items-center mt-6 -mx-2">
            @if (Auth::user()->avatar)
                <img class="object-cover w-24 h-24 mx-2 rounded-full" src="{{ Auth::user()->avatar }}" alt="avatar">
            @endif
            <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                {{ Auth::user()->lastname }}</h4>
            <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
        </div>

        <div class="flex flex-col justify-between flex-1 mt-6 relative">
            <nav class="">
                <a id="Home"
                    class="flex items-center px-4 py-2 text-gray-700 rounded-lg dark:bg-gray-800 dark:text-gray-200
            @if (Route::currentRouteName() == 'dashboard.home') bg-gray-100 @endif
            hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700
            "
                    href="{{ route('dashboard.home') }}">
                    <i class="fa-solid fa-home"></i>

                    <span class="mx-4 font-medium">Home</span>
                </a>

                <a id='Profile'
                    class="
            @if (Route::currentRouteName() == 'dashboard.profile') bg-gray-100 @endif
            flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="{{ route('dashboard.profile') }}">
                    <i class="fa-solid fa-user"></i>

                    <span class="mx-4 font-medium">Profile</span>
                </a>

                <a id='reviews'
                    class="
            @if (Route::currentRouteName() == 'dashboard.reviews') bg-gray-100 @endif
            flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="{{ route('dashboard.reviews') }}">
                    <i class="fa-solid fa-star"></i>

                    <span class="mx-4 font-medium">Reviews</span>
                </a>

                <a id="Inboxes"
                    class="
            @if (Route::currentRouteName() == 'dashboard.inboxes') bg-gray-100 @endif
            flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="{{ route('dashboard.inboxes.index') }}">
                    <i class="fa-solid fa-inbox"></i>

                    <span class="mx-4 font-medium">Inboxes</span>
                </a>

                <a id="Sponsorship"
                     class="
             @if (Route::currentRouteName() == 'dashboard.sponsor') bg-gray-100 @endif
             flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="{{ route('dashboard.sponsor') }}">
                    <i class="fa-solid fa-medal"></i>

                    <span class="mx-4 font-medium">Sponsorship</span>
                </a>

                <a id="Settings"
                    class="
            @if (Route::currentRouteName() == 'dashboard.settings') bg-gray-100 @endif
            flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                    href="#">
                    <i class="fa-solid fa-gear"></i>

                    <span class="mx-4 font-medium">Settings</span>
                </a>

                <button
                    class="absolute bottom-0 left-0 flex items-center self-end px-4 py-2 mt-5 w-full text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
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
