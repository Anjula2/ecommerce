<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Products | My Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen text-gray-800">

    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ asset('images/catering_bg.jpg') }}');"></div>
    <div class="absolute inset-0 bg-black bg-opacity-80 z-0"></div>

    <div class="relative z-10 flex flex-col min-h-screen">

        <nav class="bg-blue-200 shadow-sm">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-bold text-black hover:text-indigo-800 transition">My Shop</a>

                <div class="space-x-4">
                    @auth
                        <span class="text-sm text-gray-700">Welcome, <strong>{{ Auth::user()->name }}</strong></span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="ml-2 inline-block px-4 py-2 bg-red-100 text-red-600 text-sm font-medium rounded hover:bg-red-200 transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 text-sm font-medium rounded hover:bg-indigo-200 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-block px-4 py-2 bg-green-100 text-green-700 text-sm font-medium rounded hover:bg-green-200 transition">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-1">
            <div class="container mx-auto px-6 py-10">
                <h1 class="text-4xl font-bold text-center text-blue-600 mb-12 z-50">Explore Our Products</h1>

                @if ($products->isEmpty())
                    <p class="text-center text-gray-500 text-lg">No products available at the moment.</p>
                @else
                    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($products as $product)
                            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-56 object-cover">

                                <div class="p-5">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>
                                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                                    <p class="text-lg font-bold text-green-600">Rs. {{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>

        <footer class="bg-blue-200 shadow-inner mt-auto">
            <div class="container mx-auto px-6 py-4 text-center text-sm text-gray-700">
                &copy; {{ date('Y') }} My Shop. All rights reserved.
            </div>
        </footer>

    </div>
</body>
</html>
