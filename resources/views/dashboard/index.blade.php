@extends('layouts.app')

{{-- (RF8) Permettere ai medici di vedere le proprie statistiche
Descrizione: Un medico ha la possibilità di vedere le seguenti statistiche:
numero di messaggi e recensioni ricevute per mese/anno
grafico a barre fasce di voto ricevuti per mese/anno --}}

@section('content')
    <div class="stats shadow">

        {{-- top bar statistics --}}
        <div class="stat">
            <div class="stat-figure text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </div>
            <div class="stat-title">Total Reviews</div>
            <div class="stat-value text-primary">{{ $totalReviews }}</div>
            <div class="stat-desc">21% more than last month</div>
        </div>
        <div class="stat">
            <div class="stat-figure text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <div class="stat-title">Total Messages</div>
            <div class="stat-value text-secondary">{{ $totalInboxes }}</div>
            <div class="stat-desc">21% more than last month</div>
        </div>
        <div class="stat">
            <div class="stat-figure text-secondary">
                <div class="avatar online">
                    <div class="w-16 rounded-full">
                        <img src="{{ $user->avatar }}" />
                    </div>
                </div>
            </div>
            <div class="stat-value">Sponsorship</div>
            <div class="stat-title">Tasks done</div>
            <div class="stat-desc text-secondary">31 tasks remaining</div>
        </div>

        {{-- bar chart --}}
    </div>
@endsection
