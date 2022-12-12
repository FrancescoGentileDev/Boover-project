@extends('layouts.app')

@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
@endsection

@section('content')

    {{-- MODAL ALLERT --}}
    @if (Request::get('newUser'))
        <div class="relative flex justify-center">

            <div id="modalNewUser" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-900 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                        <div>
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-triangle-exclamation text-5xl text-yellow-500"></i>
                            </div>

                            <div class="mt-2 text-center">
                                <h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white"
                                    id="modal-title">Warning</h3>
                                <p class="mt-2 text-md text-gray-500 dark:text-gray-800">
                                    If you do not complete this form, your account will remain invisible in the search, if
                                    you want to be found enter all the data and save
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 sm:flex sm:items-center sm:justify-between">

                            <div class="sm:flex sm:items-center justify-center w-full ">

                                <button onclick="document.getElementById('modalNewUser').hidden = true"
                                    class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-yellow-600 rounded-md sm:w-auto sm:mt-0 hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-300 focus:ring-opacity-40">
                                    I read and acknowledged
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ERROR & Success ALLERT --}}
    @if (\Session::has('success'))
        <div
            class="alert flex w-full fixed right-5 bottom-5 z-20 max-w-sm overflow-hidden bg-white rounded-lg shadow-lg border-2 border-green-500 dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">Your account was updated!</p>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div
            class="alert fixed flex right-5 bottom-5 w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 z-20">
            <div class="flex items-center justify-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200">
                        There were some problems with your input.
                    </p>
                </div>
            </div>
        </div>
    @endif
    {{-- END ERROR ALLERT --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="text-4xl lg:text-5xl text-center text-gray-600 font-bold leading-tight mt-7">
        {{ $user->name . ' ' . $user->lastname }}
    </h2>

    <div class="px-5 grid gap-8 grid-cols-1 py-12 text-gray-900 " style="margin-bottom: 10rem">
        <div class="flex justify-center items-start">
            <div class="flex flex-col justify-center items-center">


            </div>
        </div>
        <form method="POST" id='form' action="{{ route('dashboard.profile.update') }}" enctype='multipart/form-data'
            class="flex flex-col gap-8">
            @csrf
            @method('PUT')

            <div>

                <div class="uppercase text-sm text-gray-600 font-bold text-center">
                    @error('avatar')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="file" name="avatar" id="avatar-input" accept="image/*" class="hidden"
                    onchange="loadfile(event)">
                <div class="flex justify-center">

                    <label for="avatar-input"
                        class="label-image my-8 md:mt-0 text-center cursor-pointer relative inline-block"
                        style="width: fit-content">
                        @if ($user->avatar)
                            <img id="avatar" class="w-64 rounded-full relative" src="{{ $user->avatar }}" alt="Contact"
                                style="aspect-ratio: 1 / 1; object-fit: cover" />
                        @else
                            <img id="avatar" src="https://dummyimage.com/500x300" alt="Contact"
                                class="label-image w-64 rounded-full" style="aspect-ratio: 1 / 1; object-fit: cover" />
                        @endif
                        <div
                            class="w-full h-full z-40 bg-gray-600 absolute top-0 left-0 rounded-full opacity-0 transition-opacity hover:opacity-75
                            flex items-center justify-center text-white text-5xl
                        ">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </label>
                </div>

            </div>

            <div class="flex flex-col md:flex-row w-full gap-3">
                <div class="flex w-full flex-col">
                    <span class="uppercase text-sm text-gray-600 font-bold">
                        Name
                        @error('name')
                            <div class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </span>
                    <input
                        class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400
                        @error('name') ring-2 ring-red-500 @enderror
                        "
                        type="text" placeholder="Enter your Name" name='name' required min="3" max="20"
                        value="{{ old('name', $user->name) }}" />
                </div>
                <div class="flex flex-col w-full">
                    <span class="uppercase text-sm text-gray-600 font-bold">
                        Last Name
                        @error('lastname')
                            <div class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </span>
                    <input
                        class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400
                        @error('lastname') ring-2 ring-red-500 @enderror"
                        type="text" placeholder="Enter your Name" name='lastname' required min="3"
                        max="20" value="{{ old('lastname', $user->lastname) }}" />
                </div>
            </div>
            <div class="">
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Bio
                    @error('presentation')
                        <div class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    </span>
                @enderror
                <input
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400
                    @error('presentation') ring-2 ring-red-500 @enderror"
                    type="text" placeholder="A short Bio about you" name='presentation' required min="60"
                    max="255" value="{{ old('presentation', $user->presentation) }}" />
            </div>
            <div class="">
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Phone Number
                    @error('phone')
                        <div class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </span>
                <input
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400
                    @error('phone') ring-2 ring-red-500 @enderror"
                    type="phone" placeholder="Enter your Phone Number including country code" name='phone' required
                    min="9" max="20" value="{{ old('phone', $user->phone) }}" />
            </div>

            <div>
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Description
                    @error('detailed_description')
                        <div class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </span>
                <textarea name="detailed_description" id="detailed_description" cols="30" rows="10" required
                    min="60"
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400
                    @error('detailed_description') ring-2 ring-red-500 @enderror">
                    {{ old('detailed_description', $user->detailed_description) }}
                </textarea>
            </div>
            {{-- <div class="pb-3">
                <div id='editor' style="min-height: 300px; max-height: 600px;"
                    class="w-full bg-gray-200 text-gray-900 rounded-b-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400">
                </div>
            </div> --}}

            <div class="w-full" style="margin-top: 2rem">
                <label class="uppercase text-sm text-gray-600 font-bold" for="Multiselect">Select your Skills</label>
                @error('skills_id')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="relative flex w-full mt-4">

                    <select id="skills" name="skills_id[]" multiple placeholder="Select skills..." autocomplete="off"
                        class="w-full
                        @error('skills') ring-2 ring-red-500 @enderror" multiple>
                        {{-- @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}"
                                {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }}>
                                {{ $skill->name }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <button
                    class="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline hover:bg-indigo-700"
                    type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>







    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        let skills = {!! $skills !!}
        new TomSelect('#skills', {
            plugins: [
                'remove_button',
                'checkbox_options'
            ],
            options: skills,
            create: false,
            maxItems: 5,
            valueField: 'id',
            labelField: 'name',
            searchField: ['name'],
        });

        let tom = document.getElementById('skills').tomselect
        tom.setValue({!! $user->skills->pluck('id') !!})


        let quill = new Quill('#editor', {
            theme: 'snow'
        });
        let textarea = document.querySelector('textarea[name=detailed_description]');

        textarea.value = `{!! old('detailed_description', $user->detailed_description) !!}`

        function loadfile(event) {
            let avatar = document.getElementById('avatar');
            avatar.src = URL.createObjectURL(event.target.files[0]);
            avatar.onload = function() {
                URL.revokeObjectURL(avatar.src) // free memory
            }
        }


        let alert = document.querySelectorAll('.alert');
        setTimeout(function() {
            alert.forEach(element => {
                element.remove();

            });
        }, 10000);
    </script>
@endsection

@section('styles')
    <style lang="scss">
        .ql-toolbar {
            --tw-bg-opacity: 1;
            background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
            --tw-text-opacity: 1;
            color: rgba(17, 24, 39, var(--tw-text-opacity));
            border-top-right-radius: 0.5rem;
            border-top-left-radius: 0.5rem;

        }

        button[type='submit'][disabled] {
            background-color: #a0aec0;
            cursor: not-allowed;
        }

        .ts-control {
            padding: 0.75rem 0.5rem;
            --tw-bg-opacity: 1;
            background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
            --tw-text-opacity: 1;
            color: rgba(17, 24, 39, var(--tw-text-opacity));
            border-radius: 0.5rem;
            /* 8px */
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
    </style>
@endsection
