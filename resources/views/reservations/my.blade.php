@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')

@section('content')
    <h1 class="font-mono text-3xl mb-4">My Reservations</h1>

    @if($reservations->isEmpty())
        <p>You have no reservations yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Pickup Date</th>
                    <th>Return Date</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                @if ($reservation->car && $reservation->car->status !== 'not available')
                <tr>
                    <td>{{ $reservation->car->car_model }}</td>
                    <td>{{ $reservation->pickup_date->format('d-m-Y') }}</td>
                    <td>{{ $reservation->return_date->format('d-m-Y') }}</td>
                    <td>{{ $reservation->subtotal }}</td>
                    <td>{{ ucfirst($reservation->status) }}</td>
                    <td>
                        @if ($reservation->status !== 'rented')
                            <a href="{{ route('reservation.edit', $reservation->reservation_id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation->reservation_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                            </form>
                        @else
                            <span class="text-gray-500">Reserved</span>
                        @endif
                    </td>
                </tr>
            @endif

                @endforeach
            </tbody>
        </table>
    @endif
@endsection
