@extends('layouts.app')

@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
@endsection

@section('content')
    <h2 class="text-4xl  lg:text-5xl font-bold leading-tight">
        Your Profile
    </h2>

    <div class="px-5 grid gap-8 grid-cols-1 py-12 text-gray-900" style="margin-bottom: 10rem">
        <div class="flex justify-center items-start">
            <div class="flex flex-col justify-center items-center">

                <div class="mt-16 md:mt-0 text-center">
                    @if ($user->avatar)
                        <img id="avatar" class="w-64 rounded-full " src="{{ $user->avatar }}" alt="Contact" style="aspect-ratio: 1 / 1; object-fit: cover"/>
                    @else
                        <img id="avatar" src="https://dummyimage.com/500x300" alt="Contact" class="w-64 rounded-full " style="aspect-ratio: 1 / 1; object-fit: cover" />
                    @endif
                </div>

            </div>
        </div>
        <form method="POST" id='form' action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data"
            class="flex flex-col gap-8">
            @csrf
            @method('PUT')
            <input type="file" name="avatar" id="avatar" accept="image/*" onchange="loadfile(event)">
            <div class="flex flex-col md:flex-row w-full gap-3">
                <div class="flex w-full flex-col">
                    <span class="uppercase text-sm text-gray-600 font-bold">
                        Name
                    </span>
                    <span class="text-red-500">ciao</span>
                    <input
                        class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                        type="text" placeholder="Enter your Name" name='name' required
                        value="{{ old('name', $user->name) }}" />
                </div>
                <div class="flex flex-col w-full">
                    <span class="uppercase text-sm text-gray-600 font-bold">
                        Last Name
                    </span>
                    <input
                        class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                        type="text" placeholder="Enter your Name" name='lastname' required
                        value="{{ old('lastname', $user->lastname) }}" />
                </div>
            </div>
            <div class="">
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Bio
                </span>
                <input
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                    type="text" placeholder="A short Bio about you" name='presentation' required
                    value="{{ old('presentation', $user->presentation) }}" />
            </div>
            <div class="">
                <span class="uppercase text-sm text-gray-600 font-bold">
                    Phone Number
                </span>
                <input
                    class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400"
                    type="phone" placeholder="Enter your Phone Number including country code" name='phone' required
                    value="{{ old('phone', $user->phone) }}" />
            </div>

            <span class="uppercase text-sm text-gray-600 font-bold">
                Description
            </span>
            <textarea name="detailed_description" id="detailed_description" cols="30" rows="10"
                class="w-full bg-gray-200 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400">

            </textarea>
            {{-- <div class="pb-3">
                <div id='editor' style="min-height: 300px; max-height: 600px;"
                    class="w-full bg-gray-200 text-gray-900 rounded-b-lg focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-400">
                </div>
            </div> --}}

            <div class="w-full" style="margin-top: 2rem">
                <label class="uppercase text-sm text-gray-600 font-bold" for="Multiselect">Select your Skills</label>
                <div class="relative flex w-full mt-4">
                    <select id="skills" name="skills_id[]" multiple placeholder="Select skills..." autocomplete="off"
                        class="w-full" multiple>
                        {{-- @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" {{ $user->skills->contains($skill) ? 'selected' : '' }}>
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
        var skills = {!! $skills !!}
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


        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var textarea = document.querySelector('textarea[name=detailed_description]');

        textarea.value = `{!! old('detailed_description', $user->detailed_description) !!}`
        skills()

        function loadfile(event) {
            var avatar = document.getElementById('avatar');
            avatar.src = URL.createObjectURL(event.target.files[0]);
            avatar.onload = function() {
                URL.revokeObjectURL(avatar.src) // free memory
            }
        }
        function skills() {
            return false
            var skills = document.getElementById('skills');
            console.log(skills)

        }
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
