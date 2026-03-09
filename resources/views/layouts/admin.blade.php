<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-gray-900 text-white fixed">

        <div class="p-6 text-xl font-bold border-b border-gray-700">
            <img src={{ asset('/images/webdesigns/porschetext2.png') }} alt="Placeholder Image" class="object-cover w-full h-full">
        </div>

        <nav class="mt-6">

            <a href="/dashboard" class="block px-6 py-3 hover:bg-gray-800">
                Dashboard
            </a>

            <a href="/dashboard/cars" class="block px-6 py-3 hover:bg-gray-800">
                Cars
            </a>

            <a href="/dashboard/orders" class="block px-6 py-3 hover:bg-gray-800">
                Orders
            </a>

            <a href="/dashboard/users" class="block px-6 py-3 hover:bg-gray-800">
                Users
            </a>

        </nav>

        <div class="absolute bottom-0 w-full p-6 border-t border-gray-700">

            <form action="/logout" method="POST">
                @csrf
                <button class="w-full bg-red-500 hover:bg-red-600 py-2 rounded">
                    Logout
                </button>
            </form>

        </div>

    </aside>


    <!-- Main Content -->
    <div class="ml-64 flex-1">

        <!-- Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">

            <h1 class="text-xl font-semibold">
                @yield('page-title')
            </h1>

            <div class="text-gray-600">
                {{ Auth::user()->name ?? 'Admin' }}
            </div>

        </header>


        <!-- Content -->
        <main class="p-6">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>
