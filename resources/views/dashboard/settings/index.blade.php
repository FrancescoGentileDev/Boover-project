@extends('layouts.app')

@section('content')
    <div class="container pt-7">
        <div
            class="basis-2/4 text-center px-6 py-2 font-medium tracking-wide base-100 capitalize transition-colors duration-300 transform bg-base-300 rounded-lg">
            Impostazioni
        </div>
        <div class="form-control">
            <form id="theme-form" method="POST" action="{{ route('dashboard.themeSwitch') }}">
                @csrf
                <label class="label cursor-pointer w-1/4">
                    <span class="label-text base-100 font-semibold">Toggle Theme Mode</span>
                    <input @if (Auth::user()->theme_preference == 'dark') checked @endif
                        onclick="document.getElementById('theme-form').submit()" id="toggleThemeInput" type="checkbox"
                        class="toggle" name="theme" />
                </label>
            </form>
        </div>
    </div>
@endsection
