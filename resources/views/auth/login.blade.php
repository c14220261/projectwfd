@extends('base.base2')

<x-auth-session-status class="mb-4" :status="session('status')" />
<form method="POST" action="{{ route('login') }}"class="m-0 p-0">
    @csrf
    <div class="min-h-screen bg-black bg-center flex items-center justify-center sm:py-12"
         style="background-image: url('{{ asset('https://media.istockphoto.com/id/1293195643/vector/vector-illustration-of-a-red-car-moving-along-the-ocean-mountain-road.jpg?s=612x612&w=0&k=20&c=VsoxZBmqnNemBLxz_F7gSWZc7_lWzpiuxFa1xOUN9d8=') }}'); background-size: cover; background-position: center center;">
        <div class="p-6 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="px-5 py-7">
                    <div class="flex justify-center mb-5">
                        <img src="{{ asset('https://pngimg.com/d/car_wheel_PNG23303.png') }}" alt="Your Logo" class="w-50 h-50">
                    </div>
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="flex justify-center mb-3">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="flex justify-center mb-3">
                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <x-primary-button class="w-full">
                        {{ __('Log in') }}
                    </x-primary-button>

                    <div class="py-5">
                        <div class="grid grid-cols-2 gap-1">
                            <div class="text-center sm:text-left whitespace-nowrap">
                                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                                    {{ __('Don\'t have an account? Register') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
