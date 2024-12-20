@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')
@section('content')

@if(session('success'))
    <div class="alert alert-success text-green-700 border border-green-300 bg-green-50 p-5 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto p-6">
    <h1 class="text-xl font-semibold">Reserve a Car</h1>
    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->car_id }}">

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="end_date" name="end_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div id="total-price" class="mt-2 text-3xl font-bold text-white pb-3">

        <script>
            document.getElementById('start_date').addEventListener('change', calculatePrice);
            document.getElementById('end_date').addEventListener('change', calculatePrice);

            function calculatePrice() {
                const startDate = new Date(document.getElementById('start_date').value);
                const endDate = new Date(document.getElementById('end_date').value);
                const pricePerDay = {{ $car->price }};
                if (startDate && endDate && endDate >= startDate) {
                    const days = (endDate - startDate) / (1000 * 60 * 60 * 24) + 1;
                    const totalPrice = days * pricePerDay;
                    document.getElementById('total-price').textContent = `Total Price: $${totalPrice}`;
                } else {
                    document.getElementById('total-price').textContent = '';
                }
            }
        </script>
        </div>

        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Reserve Car</button>
        </div>
    </form>
</div>

@endsection
