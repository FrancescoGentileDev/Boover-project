@extends('layouts.app')

@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <h2 class="text-4xl  lg:text-5xl font-bold leading-tight">
        Your Profile
    </h2>
    <div class="px-5 grid gap-8 grid-cols-1 py-12 mt-6 text-gray-900 ">
        <div class="flex justify-center items-start">
            <div class="flex flex-col justify-center items-center">

                <div class="mt-16 md:mt-0 text-center">
                    @if ($user->avatar)
                        <img class="w-64 rounded-full" src="{{ $user->avatar }}" alt="Contact" />
                    @else
                        <img src="https://dummyimage.com/500x300" alt="Contact" />
                    @endif
                </div>

            </div>
        </div>
        <form class="flex flex-col gap-8">
            <div class="flex flex-col md:flex-row w-full gap-3">
                <div class="flex w-full flex-col">
                    <span class="uppercase text-sm text-gray-600 font-bold">
                        Name
                    </span>
                    <input
                        class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                        type="text" placeholder="Enter your Name" required />
                </div>
                <div class="flex flex-col w-full">
                    <span class="uppercase text-sm text-gray-600 font-bold">
                        Last Name
                    </span>
                    <input
                        class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                        type="text" placeholder="Enter your Name" required />
                </div>
            </div>
            <div class="">
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Email
                </span>
                <input
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                    type="email" placeholder="Enter your email address" required />
            </div>
            <div class="">
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Phone Number
                </span>
                <input
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                    type="phone" placeholder="Enter your Phone Number including country code" required />
            </div>

            <span class="uppercase text-sm text-gray-600 font-bold">
                Description
            </span>
            <div class="pb-3">
                <div id='editor' style="min-height: 300px; max-height: 600px;"
                    class="w-full bg-gray-200 text-gray-900 rounded-b-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400">
                </div>
            </div>
            <div class="mt-4">
                <button
                    class="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline hover:bg-indigo-700"
                    type="submit">
                    Send Message
                </button>
            </div>
        </form>
    </div>







    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
@endsection

@section('styles')
    <style>
        .ql-toolbar {
            --tw-bg-opacity: 1;
            background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
            --tw-text-opacity: 1;
            color: rgba(17, 24, 39, var(--tw-text-opacity));
            border-top-right-radius: 0.5rem;
            border-top-left-radius: 0.5rem;

        }
    </style>
@endsection
