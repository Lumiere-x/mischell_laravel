<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body>
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="/category" class="text-sm font-semibold text-white">Category</a>
                    <a href="/about" class="text-sm font-semibold text-white">About Us</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-4">

                    @if (Auth::check())
                        <div
                            class="flex items-center justify-center bg-gradient-to-r from-pink-400 to-purple-500 h-12 w-40 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-all">
                            <span class="text-sm font-bold text-white">{{ Auth::user()->name }}</span>
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-sm font-semibold text-white bg-purple-500 hover:bg-purple-600 h-12 w-40 rounded-full transform hover:scale-110 transition-all duration-300">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login"
                            class="text-sm font-semibold text-white bg-gradient-to-r from-pink-400 to-purple-500 hover:bg-gradient-to-l h-12 w-40 rounded-full text-center flex items-center justify-center transition-all duration-300">
                            Log in
                        </a>
                    @endif
                </div>

            </nav>
        </header>

        <section class="absolute inset-0 bg-center bg-no-repeat bg-gray-700 bg-blend-multiply"
            style="background-image: url('{{ asset('img/coklat.jpg') }}'); background-size: 100% auto; background-position: center; height: 500px;">
        </section>

        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl font-semibold tracking-tight text-pink-500 sm:text-7xl">Sweet Recipes</h1>
                <p class="text-lg font-medium text-purple-400 sm:text-xl mt-4">Create your own recipe.</p>

                <div class="mt-10 flex items-center justify-center gap-x-6">

                    <a href="{{ route('recipes.create') }}"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-pink-500 to-purple-600 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 transition-all duration-300">
                        Create
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-6 py-8 mx-auto max-w-7xl">
            @foreach ($recipes as $recipe)
                <div class="max-w-sm rounded overflow-hidden shadow-lg mb-8 bg-white">
                    <div class="flex items-center">

                        <div class="w-1/3">
                            <img class="object-cover w-full h-48 rounded-md"
                                src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image">
                        </div>

                        <div class="px-6 py-4 w-2/3">
                            <div class="font-bold text-2xl text-gray-800 mb-2">{{ $recipe->title }}</div>
                            <p class="text-gray-600 text-base">{{ $recipe->description }}</p>
                        </div>
                    </div>

                    <a href="/show/{{ $recipe->id }}">
                        <button type="button"
                            class="text-white bg-gradient-to-r from-pink-500 to-purple-600 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 w-full mt-4">
                            Detail
                        </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
