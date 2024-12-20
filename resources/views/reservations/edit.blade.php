@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')
@section('content')

    <h1>Edit Reservation</h1>

    <form action="{{ route('reservations.update', $reservation->reservation_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="pickup_date">Pickup Date</label>
            <input type="date" name="pickup_date" id="pickup_date" class="form-control"
                   value="{{ $reservation->pickup_date->format('Y-m-d')}}" required>
        </div>
        <div class="form-group">
            <label for="return_date">Return Date</label>
            <input type="date" name="return_date" id="return_date" class="form-control"
                   value="{{ $reservation->return_date-> format('Y-m-d')}}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </div>
    </form>
@endsection
