<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-white bg-center items-center justify-center sm:py-12 p-0 m-0"
      style="background-image: url('{{ asset('https://media.cntraveler.com/photos/5727640996cb06c13a979153/16:9/w_2560%2Cc_limit/GettyImages-161842456.jpg') }}'); background-size: cover; background-position: center center;">

    <div class="py-5">
        <header class="absolute inset-x-0 top-0 z-50">
            <!-- You can add your navbar or header content here -->
        </header>

        <br>
        <br>

        <div class="container m-auto">
            @yield('content')
        </div>
    </div>

</body>
</html>
