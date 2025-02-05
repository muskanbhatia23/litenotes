<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LiteNotes</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
      
    </head>
    <body class="font-sans antialiased min-h-screen grid place-items-center">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <nav>
            @if (Route::has('login'))
           
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/notes') }}" class="text-indigo-600 hover:text-indigo-800">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 mr-4">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </nav>
           <h1 class="text-7xl">LiteNotes</h1>
          
        </div>
    </body>
</html>
