<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CarStore')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-br from-blue-200 via-white to-blue-400 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white/10 backdrop-blur-md border-b border-white/20 z-50">
        <div class="container mx-auto flex justify-between items-center p-4">

            <!-- Logo -->
            <a href="/">
                <div class="text-xl font-bold">
                    <img src={{ asset('/images/webdesigns/porschetext.png') }} alt="Placeholder Image" class="h-6">
                </div>
            </a>

            <!-- Menu -->
            <ul class="flex space-x-6">
                <li>
                    <a href="{{ url('/') }}" class="hover:text-gray-500">Home</a>
                </li>
                <li>
                    <a href="{{ route('client.orders.index') }}" class="hover:text-gray-500">
                        My Orders
                    </a>
                </li>
                <li>
                    <a href="{{ url('/cars') }}" class="hover:text-gray-200">All Cars</a>
                </li>
                {{-- <li>
                    <a href="{{ url('/about') }}" class="hover:text-gray-200">About</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}" class="hover:text-gray-200">Contact</a>
                </li> --}}
            </ul>

            <div class="flex items-center gap-2">
                @auth
                    <span>{{ Auth::user()->name }}</span>

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-2 py-1 text-white rounded">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="bg-white/20 px-4 py-2 rounded-lg hover:bg-white/30 transition">
                        Login
                    </a>
                @endauth
            </div>


        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6 pt-24">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center/80 p-4 mt-auto">
        <p>© 2026 CarStore. All rights reserved.</p>
    </footer>

</body>

</html>
