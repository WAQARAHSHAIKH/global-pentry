<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Global Pantry | Authentic Recipes</title>
    
    {{-- Load Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    {{-- Load Font Awesome Icons (for the search, add, and other icons) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJzL5gJk0d3y/4zI/r0b9wz3C0s6M1u9e5z50C5Rz5k50O5w50N5g50O5w50N5g50O5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom CSS (For colors, fonts, and custom utilities like vh-60) --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    {{-- Styles pushed from individual pages (e.g., specific section styles) --}}
    @stack('styles')
</head>
<body>

    {{-- The main header/navigation goes here --}}
    @include('partials.header')

    {{-- The main content of the page goes here (@yield('content') is replaced by the content section of child views) --}}
    @yield('content')

    {{-- The footer goes here --}}
    @include('partials.footer')

    {{-- Load Bootstrap 5 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- Custom JS --}}
    <script src="{{ url('js/app.js') }}"></script>

    {{-- Scripts pushed from individual pages (e.g., form toggles) --}}
    @stack('scripts')
</body>
</html>