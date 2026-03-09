<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<div class="bg-sky-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
<div class="w-1/2 h-screen hidden lg:block">
  <img src={{ asset('/images/webdesigns/auth.png') }} alt="Placeholder Image" class="object-cover w-full h-full">
</div>
<!-- Right: Register Form -->
<div class= "lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
  <h1 class="text-4xl font-semibold mb-4">Register</h1>
  <form action="/register" method="POST">
    @csrf
    <div class="mb-4" "bg-sky-100">
      <label for="name" class="block text-gray-600">Name</label>
      <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>
    <div class="mb-4" "bg-sky-100">
      <label for="email" class="block text-gray-600">Email</label>
      <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>
    <div class="mb-4" "bg-sky-100">
      <label for="password" class="block text-gray-600">Password</label>
      <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>
    <div class="mb-4" "bg-sky-100">
      <label for="phone" class="block text-gray-600">Phone</label>
      <input type="phone" id="phone" name="phone" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    </div>
    <button type="submit" class="bg-slate-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Register</button>
  </form>
  <div class="mt-6 text-slate-500 text-center">
    <a href="/login" class="hover:underline">Sign in Here</a>
  </div>
</div>
</div>