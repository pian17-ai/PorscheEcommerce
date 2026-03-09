<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

<nav class="bg-gray-800 text-white p-4">
    <a href="/">Home</a>
    <a href="/cars">Cars</a>
</nav>

<div class="container mx-auto mt-5">

    @yield('content')

</div>

<footer class="text-center mt-10">
    <p>© 2026 CarStore</p>
</footer>

</body>
</html>
