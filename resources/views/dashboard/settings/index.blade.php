@extends('layouts.app')

@section('content')
    <div>
        <div class="form-control">
            <form id="theme-form" method="POST" action="{{ route('dashboard.themeSwitch') }}">
                @csrf
                <label class="label cursor-pointer w-1/6">
                    <span class="label-text">Toggle Theme Mode</span>
                    <input @if (Auth::user()->theme_preference == 'dark') checked @endif
                        onclick="document.getElementById('theme-form').submit()" id="toggleThemeInput" type="checkbox"
                        class="toggle" name="theme" />
                </label>
            </form>
        </div>
    </div>
@endsection
