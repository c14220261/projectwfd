@vite('resources/css/app.css')
@extends('base.base')
@section('content')
@include('components.navbar')
@if(session('success'))
    <div class="alert alert-success text-green-700 border border-green-300 bg-green-50 p-5 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto p-6">
    <h1 class="text-xl font-semibold">My Reservations</h1>

    <table class="min-w-full table-auto mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Car Model</th>
                <th class="px-4 py-2 text-left">Start Date</th>
                <th class="px-4 py-2 text-left">End Date</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td class="px-4 py-2">{{ $reservation->car->car_model }}</td>
                    <td class="px-4 py-2">{{ $reservation->start_date }}</td>
                    <td class="px-4 py-2">{{ $reservation->end_date }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('reservation.edit', $reservation->reservation_id) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Cancel</button>
                        </form> |
                        <a href="{{ route('reservation.extend', $reservation->id) }}" class="text-green-600">Extend</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
