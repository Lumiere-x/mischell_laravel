<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-purple-900 to-pink-800">

    <!-- Background Effect -->
    <!-- Menghapus background image, hanya menggunakan gradasi warna -->
    <section
        class="absolute inset-0 bg-center bg-no-repeat bg-cover bg-blend-multiply bg-gradient-to-r from-purple-900 to-pink-800">
    </section>

    <div class="flex items-center justify-center min-h-screen relative z-10">
        <!-- Memperbesar kotak login -->
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-10">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Login</h2>

            <!-- Alert for errors -->
            @if ($errors->any())
                <div class="mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:bg-blue-50 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <button type="button" onclick="togglePasswordVisibility('password')"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9l2.8 2.8m0 0L17 14m2.8-2.8L21 9m0 0L21 9c-1.97-3.93-5.8-5-9-5s-7.03 1.07-9 5c0 0 0 0 0 0m2 2c1.08-1.75 2.8-3 4.75-3 2.76 0 5 2.24 5 5s-2.24 5-5 5c-1.95 0-3.67-1.25-4.75-3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-medium py-2 px-4 rounded-md hover:bg-gradient-to-l focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                    Login
                </button>
            </form>

            <!-- Register Link -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Don't have an account?
                <a href="{{ route('auth.register') }}" class="text-blue-500 hover:underline">Register here</a>
            </p>
        </div>
    </div>

</body>

</html>
