<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/backOffice.js') }}"></script>
    @yield('head')
    <title>Document</title>
</head>


<body>

  <div style="height: 100vh; z-index: 30" class="flex flex-col w-64 px-4 py-8 bg-white border-r dark:bg-gray-900 dark:border-gray-700 fixed h-screen">
    <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">Boover!</h2>

    <div class="flex flex-col items-center mt-6 -mx-2">
        <img class="object-cover w-24 h-24 mx-2 rounded-full" src="{{ Auth::user()->avatar }}" alt="avatar">
        <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
        <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400">{{  Auth::user()->email }}</p>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6 relative">
        <nav class="">
            <a id="Home" class="flex items-center px-4 py-2 text-gray-700 rounded-lg dark:bg-gray-800 dark:text-gray-200" href="{{ route('dashboard.home') }}">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="mx-4 font-medium">Home</span>
            </a>

            <a id='Profile' class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="{{ route('dashboard.profile') }}">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="mx-4 font-medium">Profile</span>
            </a>

            <a id='reviews' class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
              <i class="fa-regular fa-star"></i>

                <span class="mx-4 font-medium">Reviews</span>
            </a>

            <a id="Inboxes" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
              <i class="fa-solid fa-inbox"></i>

                <span class="mx-4 font-medium">Inboxes</span>
            </a>

            <a id="Settings" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="mx-4 font-medium">Settings</span>
            </a>

            <button class="absolute bottom-0 left-0 flex items-center self-end px-4 py-2 mt-5 w-full text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"  onclick="event.preventDefault();
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

    <div class="px-8 md:px-0 container mx-auto pl-64" style="padding-left: 16rem">
        @yield('content')
    </div>




</body>
@yield('styles')
</html>
