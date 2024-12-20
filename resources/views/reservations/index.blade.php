@vite('resources/css/app.css')
@extends('base.base')
@section('content')

    <h1>Reservations</h1>


    <table class="table">
        <thead>
            <tr>

                <th>Car</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservation as $reservation)
            <tr>
                <td>{{ $reservation->car->car_model }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <a href="{{ route('reservation.edit', $reservation->reservation_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation->reservation_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
