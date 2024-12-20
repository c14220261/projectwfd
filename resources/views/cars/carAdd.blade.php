@vite('resources/css/app.css')
@extends('base.base')
@include('components.navbar')
@section('content')
    <div class="container my-4 mx-auto p-8  border border-gray-200 bg-cyan-400 rounded">
        <h1 class="font-medium text-3xl">Add New Car</h1>
        <p class="text-gray-600 mt-6">Please enter the details for the new car. Ensure all fields are filled correctly.</p>

        <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mt-8 space-y-6 ">

                <div>
                    <label for="car_model" class="text-sm text-gray-700 block mb-1 font-medium">Car Model</label>
                    <input type="text" name="car_model" id="car_model" value="{{ old('car_model') }}" placeholder="Input Car Model"
                           class="bg-gray-500 text-white border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" required>
                    @error('car_model')
                    <div class="border border-red-500 text-red-500 text-xs italic">{{ $message }}</div>
                    @enderror
                </div>


                <div>
                    <label for="year" class="text-sm text-gray-700 block mb-1 font-medium">Car Year</label>
                    <input type="number" name="year" id="year" min="1900" max="2999" value="{{ old('year') }}" placeholder="Input Car Year"
                           class="bg-gray-500 border text-white border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" required>
                    @error('year')
                    <div class="border border-red-500 text-red-500 text-xs italic">{{ $message }}</div>
                    @enderror
                </div>


                <div>
                    <label for="number_plate" class="text-sm text-gray-700  block mb-1 font-medium">Car Number Plate</label>
                    <input type="text" name="number_plate" id="number_plate" value="{{ old('number_plate') }}" placeholder="Input Car Number Plate"
                           class="bg-gray-500 text-white border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" required>
                    @error('number_plate')
                    <div class="border border-red-500 text-red-500 text-xs italic">{{ $message }}</div>
                    @enderror
                </div>


                <div>
                    <label for="price" class="text-sm text-gray-700 block mb-1 font-medium">Car Price</label>
                    <input type="text" name="price" id="price" value="{{ old('price') }}" placeholder="Input Price"
                           class="bg-gray-500 text-white border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 w-full" required>
                    @error('price')
                    <div class="border border-red-500 text-red-500 text-xs italic">{{ $message }}</div>
                    @enderror
                </div>


                <div>
                    <label for="no_rangka" class="text-sm text-gray-700 block mb-1 font-medium">Nomor Rangka</label>
                    <input type="text" name="no_rangka" id="no_rangka" value="{{ old('no_rangka') }}" placeholder="Input No. Ranka"
                           class="bg-gray-500 text-white border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 w-full" required>
                    @error('no_rangka')
                    <div class="border border-red-500 text-red-500 text-xs italic">{{ $message }}</div>
                    @enderror
                </div>


                <div>
                    <label for="img" class="text-sm text-gray-700 block mb-1 font-medium">Car Photo</label>
                    <input type="file" id="img" name="img"
                               class="w-full  font-medium text-white text-sm bg-gray-500 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />

                    @error('img')
                    <div class="border border-red-500 text-red-500 text-xs italic">{{ $message }}</div>
                    @enderror
                </div>


            </div>

            <div class="space-x-4 mt-8 flex justify-start">
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>
                <a href="/cars" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
