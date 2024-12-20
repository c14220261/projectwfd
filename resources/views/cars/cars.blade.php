@vite('resources/css/app.css')
@extends('base.base')
@section('content')
@include('components.navbar')
@if(session('success'))
    <div class="alert alert-success text-green-700 border border-green-300 bg-green-50 p-5 rounded">
        {{ session('success') }}
    </div>
@endif
<div class="min-h-screen bg-white bg-center items-center justify-center sm:py-12"
style="background-image: url('{{ asset('https://media.cntraveler.com/photos/5727640996cb06c13a979153/16:9/w_2560%2Cc_limit/GettyImages-161842456.jpg') }}'); background-size: cover; background-position: center center;">
<div class="ml-20">
<x-searchfilter />
</div>
    <div class="pl-28">
    @can('add-car')
        <a href="{{route('car.create')}}"  class="inline-block rounded bg-primary pl-5 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong" >Add New Car</a>
    @endcan


    </div>
    <div class="container my-4 mx-auto grid grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($cars as $car)
    <div class="cursor-pointer group relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 hover:shadow-lg transition-shadow duration-300">
        <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
            <img src="{{ asset('storage/' . $car->img) }}" alt="{{ $car->car_model }} Image" class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"">
        </div>
        <div class="p-4">
            <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                <h1 class="text-slate-900 font-serif font-medium text-3xl car-model">{{$car['car_model']}}</h1>
            </h6>
            <p class="text-slate-600 leading-normal font-light">
            <h3 class="text-slate-900 mt-3 dark:text-black text-small font-medium tracking-tight car-year">Car Year : {{$car['year']}}</h3>
            <h3 class="text-slate-900 dark:text-black text-small font-medium tracking-tight car-status">Car Status :  {{$car['status']}}</h3>
            <h3 class="text-slate-900 dark:text-black text-small font-medium tracking-tight car-status">Car Rental Price :  {{$car['price']}}</h3>
            </p>
        </div>
        <div class="px-4 pb-4 pt-0 mt-2">
            <div class="flex justify-center space-x-4">
                <a href="/cars/view/{{$car['car_id']}}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-400 text-white">
                    Detail
                </a>

                @can('edit-car')
                    <a href="{{ route('car.edit', $car->car_id) }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold hover:bg-indigo-400 text-white">
                        Edit
                    </a>
                @endcan

                <a href="{{ route('reservation.create', $car->car_id) }}" class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold hover:bg-green-400 text-white">
                    Reserve
                </a>
            </div>
        </div>
    </div>
    @endforeach
    </div>

</div>
