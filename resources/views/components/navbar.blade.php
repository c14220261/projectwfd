<nav class="bg-indigo-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center text-white text-2xl font-bold space-x-2">
                    <img src="{{ asset('https://pngimg.com/d/car_wheel_PNG23303.png') }}" alt="Your Logo" class="h-10 w-10">
                    <span>CarRentalPro</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('cars.index') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                        Book a Car
                    </a>

                    <!-- Admin-Specific Links -->
                    @can('navbar-auth')
                        <a href="{{ route('carstatus.index') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                            Car Status
                        </a>
                        <a href="{{ route('car.create') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                            Add Car
                        </a>
                    @endcan

                    <a href="{{ route('reservations.my') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                        My Reservations
                    </a>

                    <a href="{{ route('profile.edit') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                        Account
                    </a>

                    <!-- Logout Button -->
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex md:hidden">
                <button class="text-white inline-flex items-center justify-center p-2 rounded-md hover:bg-indigo-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

