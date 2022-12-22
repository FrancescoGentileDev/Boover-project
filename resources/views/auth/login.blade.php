@extends('layouts.auth')

@section('content')
    <section class="bg-white ">
        <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
            <form class="w-full max-w-md" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex items-center justify-center mt-6">
                    <a href="/login"
                        class="w-1/3 pb-4 font-medium text-center text-gray-800 capitalize border-b-2 border-blue-500  ">
                        sign in
                    </a>

                    <a href="/register"
                        class="w-1/3 pb-4 font-medium text-center text-gray-500 capitalize border-b  ">
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


                {{-- EMAIL --}}
                <div class="relative flex items-center mt-6">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 "
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>

                    <input required name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        class="
                        @error('email') ring-2 ring-red-500 @enderror
                        block w-full py-3 text-gray-700 bg-white border rounded-lg px-11    focus:border-blue-400  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        placeholder="Email address">
                </div>




                {{-- PASSWORD --}}
                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-3 text-gray-300 "
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>

                    <input required name="password" type="password" autocomplete="new-password"
                        class="
                        @error('password') ring-2 ring-red-500 @enderror
                        block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg    focus:border-blue-400  focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        placeholder="Password">
                </div>



                <div class="mt-6">
                    <button id="submit"
                        class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Login
                    </button>

                    <div class="mt-6 text-center ">
                        <a href="/register" class="text-sm text-blue-500 hover:underline ">
                            Don't have an account?
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
