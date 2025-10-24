<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'The Global Pantry | Discover & Share Global Recipes')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script>
        // Define colors for Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', // Your primary blue
                        secondary: '#f97316', // Your secondary orange
                    },
                }
            }
        }
    </script>
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJ8yI0yRzT4p3Y3O6Qn4iQe7i4B5xK1uX8h5t2bN1X+3t5e7v5O5aN7/k1g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    {{-- Local CSS --}}
    <link rel="stylesheet" href="{{ asset('css/browse.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


    @stack('styles') {{-- For page-specific CSS --}}
</head>

<body class="bg-gray-50 font-sans">
    {{-- Include your header/navigation --}}
    @include('partials.header')

    {{-- Main content will go here --}}
    <main>
        @yield('content')
    </main>

    {{-- Include your footer --}}
    @include('partials.footer')

    @stack('scripts') {{-- For page-specific JS --}}
    <script src="{{ asset('js/browse.js') }}"></script>
    <script src="{{ asset('js/homepage.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{asset('js/recipe_cards_logic.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/footer.js')}}"></script>
    <!-- <script src="firebase-config.js"></script> -->

</body>

</html>