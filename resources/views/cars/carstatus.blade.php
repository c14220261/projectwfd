@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')
@section('content')

    <x-searchfilter />

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Car Management</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-200 text-red-800 p-3 rounded-md mb-4">
                {{ session('error') }}
            </div>
        @endif

        <table class="table-fixed w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Model</th>
                    <th class="border border-gray-300 px-4 py-2">Year</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr class="bg-white">
                    <td class="border border-gray-300 px-4 py-2 car-model">{{ $car->car_model }}</td>
                    <td class="border border-gray-300 px-4 py-2 car-year">{{ $car->year }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <span class="{{ $car->status === 'available' ? 'text-green-600' : '' }}">
                            {{ ucfirst($car->status) }}
                        </span><br>
                        @foreach ($car->reservations as $reservation)
                            @if($reservation->status === 'pending')
                                <span class="text-yellow-600">Pending</span>
                            @elseif($reservation->status === 'rented')
                                <span class="text-red-600">Rented</span>
                            @endif
                        @endforeach
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($car->status === 'available')
                            <form action="{{ route('cars.checkOut', $car->car_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Check-Out
                                </button>
                            </form>
                        @else
                            <form action="{{ route('cars.checkIn', $car->car_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Check-In
                                </button>
                            </form>
                        @endif

                        {{-- Add buttons for Pending/Rented --}}
                        @foreach ($car->reservations as $reservation)
                            @if ($reservation->status === 'pending')
                                <form action="{{ route('reservations.markAsRented', $reservation->reservation_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-blue-500 text-black px-3 py-1 rounded hover:bg-blue-600">
                                        Mark as Rented
                                    </button>
                                </form>
                            @elseif ($reservation->status === 'rented')
                                <form action="{{ route('reservations.markAsPending', $reservation->reservation_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        Mark as Pending
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
@endsection
