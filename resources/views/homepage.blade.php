<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-gray-100">
    @include('components.navbar')

    <!-- Hero Section -->
    <header class="bg-cover bg-center h-screen" style="background-image: url('https://carwow-uk-wp-3.imgix.net/18015-MC20BluInfinito-scaled-e1707920217641.jpg');">
        <div class="flex items-center justify-center h-full bg-gray-900 bg-opacity-80">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold">Find the Perfect Car for Your Journey</h1>
                <p class="mt-4 text-lg">Affordable, reliable, and convenient car rental service.</p>
                <a href="{{route('cars.index')}}" class="mt-6 inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-gray-200">Explore Now</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-indigo-900">Our Services</h2>
            <p class="text-center text-gray-600 mt-4">We provide a variety of services to cater to your travel needs.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <!-- Card 1 -->
                <div class="relative p-6 bg-gray-50 rounded-lg shadow-md text-center overflow-hidden">
                    <!-- Image -->
                    <div class="relative">
                        <img
                            src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/93/2024/08/14/312a6d8d-bf12-449f-8e8d-3c13dea177c3-1537065801.jpg"
                            alt="Premium Cars"
                            class="w-full h-48 object-cover rounded-md filter blur-sm"
                        />
                        <!-- Overlay Text -->
                        <h3 class="absolute inset-0 flex items-center justify-center text-xl font-bold text-white bg-black bg-opacity-40">
                            Premium Cars
                        </h3>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 mt-4">Experience premium comfort and style with our luxury car rentals.</p>
                </div>

                <!-- Card 2 -->
                <div class="relative p-6 bg-gray-50 rounded-lg shadow-md text-center overflow-hidden">
                    <!-- Image -->
                    <div class="relative">
                        <img
                            src="https://www.spiralytics.com/wp-content/uploads/2022/02/Easily-Affordable-Marketing-Strategies-1.jpg"
                            alt="Affordable Rates"
                            class="w-full h-48 object-cover rounded-md filter blur-sm"
                        />
                        <!-- Overlay Text -->
                        <h3 class="absolute inset-0 flex items-center justify-center text-xl font-bold text-white bg-black bg-opacity-40">
                            Affordable Rates
                        </h3>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 mt-4">Get the best deals on car rentals for your next trip.</p>
                </div>

                <!-- Card 3 -->
                <div class="relative p-6 bg-gray-50 rounded-lg shadow-md text-center overflow-hidden">
                    <!-- Image -->
                    <div class="relative">
                        <img
                            src="https://repairsmith-prod-wordpress.s3.amazonaws.com/2022/11/mechanic-working-on-engine.jpg"
                            alt="Reliable Cars"
                            class="w-full h-48 object-cover rounded-md filter blur-sm"
                        />
                        <!-- Overlay Text -->
                        <h3 class="absolute inset-0 flex items-center justify-center text-xl font-bold text-white bg-black bg-opacity-40">
                            Reliable Cars
                        </h3>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 mt-4">Reliable cars that are regularly maintained so you can enjoy your trips worry-free.</p>
                </div>
            </div>

        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-indigo-600 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p>&copy; 2024 CarRentalPro. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
