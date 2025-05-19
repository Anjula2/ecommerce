<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">My Shop</a>

            <div class="space-x-4">
                @auth
                    <span class="text-gray-600">Hi, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-green-600 hover:underline">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Products Section -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Our Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($product->description, 100) }}</p>
                        <p class="text-lg font-bold text-green-600">Rs. {{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($products->isEmpty())
            <p class="text-center text-gray-500 mt-12">No products available at the moment.</p>
        @endif
    </div>

</body>
</html>
