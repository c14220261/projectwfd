@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')
<div class="container my-4 mx-auto">

    <h1 class="text-2xl font-bold">{{ $car->car_model }}</h1>

    <p><span class="font-bold">Car Year:</span> {{ $car->year }}</p>
    <p><span class="font-bold">Car Status:</span> {{ $car->status }}</p>
    <p><span class="font-bold">Car Number Plate:</span> {{ $car->number_plate }}</p>
    <p><span class="font-bold">Car Price:</span> {{ $car->price }}</p>

    @can('add-car')
        <p><span class="font-bold">Car No. Rangka:</span> {{ $car->no_rangka }}</p>
    @endcan



@can('add-car')
    <div class="my-4">
        <a href="{{ route('cars.show', ['car' => $car->car_id, 'filter' => 'future']) }}" class="btn btn-primary px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">Future Rentals</a>
        <a href="{{ route('cars.show', ['car' => $car->car_id, 'filter' => 'past']) }}" class="btn btn-secondary px-4 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">Past Rentals</a>
        <a href="{{ route('cars.show', ['car' => $car->car_id]) }}" class="btn btn-success px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700">All Rentals</a>
    </div>
    <h2 class="mt-4 text-xl font-semibold">Rental History</h2>
    @if ($reservations->isEmpty())
        <p>No rentals records available.</p>
    @else
        <!-- Rental History Table -->
        <table class="min-w-full table-auto mt-4 border-collapse border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 text-left border-b">Name</th>
                <th class="py-2 px-4 text-left border-b">Email</th>
                <th class="py-2 px-4 text-left border-b">Pickup Date</th>
                <th class="py-2 px-4 text-left border-b">Return Date</th>
                <th class="py-2 px-4 text-left border-b">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reservations as $reservation)
                <tr>
{{--                    @dd($reservation)--}}
                    <td class="py-2 px-4 border-b">{{ $reservation->user->name }} </td>
                    <td class="py-2 px-4 border-b">{{ $reservation->user->email }} </td>
                    <td class="py-2 px-4 border-b">{{ $reservation->pickup_date->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">{{ $reservation->return_date->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">{{ $reservation->pickup_date < now() ? 'Past' : 'Upcoming' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endcan
    @can('delete-car')
        <div class="py-3">
            <form action="{{ route('car.delete', $car->car_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');" style="display: inline">
                @csrf
                @method('delete')

                <button type="submit" class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-700">
                    Delete Car
                </button>
            </form>
        </div>
    @endcan

    <img src="{{ asset('storage/' . $car->img) }}" alt="{{ $car->car_model }} Image" class=" mt-5 max-h-72">

</div>
