@extends('layouts.auth')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
            <form class="w-full max-w-md" action="{{ route('register') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="flex items-center justify-center mt-6">
                    <a href="#"
                        class="w-1/3 pb-4 font-medium text-center text-gray-500 capitalize border-b dark:border-gray-400 dark:text-gray-300">
                        sign in
                    </a>

                    <a href="#"
                        class="w-1/3 pb-4 font-medium text-center text-gray-800 capitalize border-b-2 border-blue-500 dark:border-blue-400 dark:text-white">
                        sign up
                    </a>
                </div>

                                    @if ($errors->any())
                                        <div class="mt-6">
                                                <ul class="text-center">
                                                    @foreach ($errors->all() as $error)
                                                        <li class="mt-8 text-red-600 font-bold">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                        </div>
                                    @endif

                <div class="flex gap-2">
                    {{-- NAME --}}
                    <div class="relative flex items-center mt-8">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input required name="name" value="{{ old('name') }}" type="text" autocomplete="name"
                            class="
                            @error('name') ring-2 ring-red-500 @enderror
                            block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                            placeholder="Name">
                    </div>

                    {{-- LASTNAME --}}
                    <div class="relative flex items-center mt-8">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input required name="lastname" value="{{ old('lastname') }}" type="text" autocomplete="lastname"
                            class="
                            @error('lastname') ring-2 ring-red-500 @enderror
                            block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                            placeholder="Lastname">
                    </div>

                </div>
                {{-- EMAIL --}}
                <div class="relative flex items-center mt-6">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>

                    <input required name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        class="
                        @error('email') ring-2 ring-red-500 @enderror
                        block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        placeholder="Email address">
                </div>

                {{-- BIRTHDAY DATE --}}
                <div class="relative flex items-center mt-6">
                    <span class="absolute">
                        <i class="fa-regular fa-calendar text-gray-300 text-xl px-4 dark:text-gray-500"></i>
                    </span>

                    <input required name="birthday_date" type="date"
                        style="color: rgba(55, 65, 81, var(--tw-text-opacity));" value="{{ old('birthday_date') }}"
                        autocomplete="birthday_date"
                        class="
                        @error('birthday_date') ring-2 ring-red-500 @enderror
                        block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>

                {{-- PROFILE PHOTO --}}
                {{-- <label for="dropzone-file"
                    class="flex items-center px-3 py-3 mx-auto mt-6 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300 dark:text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>

                    <h2 class="mx-3 text-gray-400">Profile Photo</h2>

                    <input id="dropzone-file" name='avatar' type="file" accept="image/*" class="hidden" />
                </label> --}}

                {{-- PASSWORD --}}
                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>

                    <input required name="password" type="password" autocomplete="new-password"
                        class="
                        @error('password') ring-2 ring-red-500 @enderror
                        block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        placeholder="Password">
                </div>

                {{-- CONFIRM PASSWORD --}}

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>

                    <input required type="password" name='password_confirmation'
                        autocomplete="new-password"
                        class="
                        @error('password_confirmation') ring-2 ring-red-500 @enderror
                        block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        placeholder="Confirm Password">
                </div>

                <div class="mt-6">
                    <button id="submit"
                        class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Sign Up
                    </button>

                    <div class="mt-6 text-center ">
                        <a href="#" class="text-sm text-blue-500 hover:underline dark:text-blue-400">
                            Already have an account?
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </section>


    <script>
        const submitButton = document.getElementById('submit');
        const form = document.getElementById('form');

        form.addEventListener('submit', () => {
            submitButton.disabled = true;
            submitButton.innerText = 'Loading...';
        });
    </script>

@endsection

@section('styles')
    <style>
        button[disabled] {
            background-color: #a0aec0;
        }

        button[disabled]:hover {
            background-color: #a0aec0;
            cursor: not-allowed;
        }
        ul {
            list-style: none;
        }
        li {
            color:red
        }
    </style>
@endsection
