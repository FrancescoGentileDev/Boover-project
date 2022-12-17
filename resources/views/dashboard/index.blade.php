@extends('layouts.app')

{{-- (RF8) Permettere ai medici di vedere le proprie statistiche
Descrizione: Un medico ha la possibilità di vedere le seguenti statistiche:
numero di messaggi e recensioni ricevute per mese/anno
grafico a barre fasce di voto ricevuti per mese/anno --}}

@section('content')
    {{-- top bar statistics --}}
    <div style="user-select: none" class="flex flex-row justify-center py-10">
        <div class="stats shadow mt-10 bg-base-200 w-screen">
            <div class="stat hover:bg-base-300">
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
                <div class="stat-desc">You have a total of {{ $totalReviews }} reviews.</div>
            </div>
            <div class="stat hover:bg-base-300">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z">
                        </path>
                    </svg>
                </div>
                <div class="stat-title">Total Messages</div>
                <div class="stat-value text-secondary">{{ $totalInboxes }}</div>
                <div class="stat-desc">You have a total of {{ $totalInboxes }} messages.</div>
            </div>
            <div class="stat hover:bg-base-300">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                </div>
                <div class="stat-title">Average Evaluation</div>
                <div class="stat-value" style="color: orange">{{ number_format($average, 2, '.', '') }}</div>
                <div class="stat-desc">Average evaluation is based on your reviews.</div>
            </div>
            <div class="stat hover:bg-base-300">
                <div class="stat-figure text-secondary">
                    <div class="avatar online">
                        <div class="w-16 rounded-full">
                            <img src="{{ $user->avatar }}" />
                        </div>
                    </div>
                </div>
                <div class="stat-value">Sponsorship</div>
                <div class="stat-title mt-3">
                    @if ($isSponsor)
                        <span style="color: green">Active</span>
                    @else
                        <span style="color: red">Inactive</span>
                        <span style="color: green" class="ml-5"><a href="{{ route('dashboard.sponsor') }}">GET A
                                SPONSOR!</a></span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- bar chart --}}
    <div>
        <canvas id="statsChart" class="mt-7"></canvas>
    </div>

    <script>
        const canvasChart = document.getElementById('statsChart');

        const config = {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Average votes per month',
                    data: [2, 3, 1, 3, 1, 4, 3, 5, 2, 1, 3, 4],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            },
        };

        const statsChart = new Chart(canvasChart, config);
    </script>


    {{-- bottom page statistics --}}
    <div class="flex flex-row gap-x-8">
        {{-- last reviews table --}}
        <div class="mt-10 py-10 w-2/4">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Last Reviews</th>
                            <th>Open Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>

                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div>
                                            <div class="font-bold">Title: {{ $review->title }}</div>
                                            <div class="text-sm opacity-50">From: {{ $review->nickname }}</div>
                                        </div>
                                    </div>
                                </td>
                                <th>
                                    <a href="{{ route('dashboard.reviews.show', $review->id) }}"
                                        class="btn btn-ghost btn-xs">details</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- last messages table --}}
        <div class="mt-10 py-10 w-2/4">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Last Messages</th>
                            <th>Open Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inboxes as $inbox)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div>
                                            <div class="font-bold">Title: {{ $inbox->title }}</div>
                                            <div class="text-sm opacity-50">From: {{ $inbox->nickname }}</div>
                                        </div>
                                    </div>
                                </td>
                                <th>
                                    <a href="{{ route('dashboard.inboxes.show', $inbox->id) }}"
                                        class="btn btn-ghost btn-xs">details</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
