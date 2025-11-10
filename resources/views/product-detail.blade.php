@extends('layouts.app')

@section('title', $product['name'] . ' - ShopEasy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-slate-600">
                <li><a href="/" class="hover:text-blue-600">Home</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li><a href="{{ route('products') }}" class="hover:text-blue-600">Products</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li class="text-slate-800 font-medium">{{ $product['name'] }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="space-y-4">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-96 object-cover">
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer border-2 border-blue-500">
                        <img src="{{ $product['image'] }}" alt="Thumbnail" class="w-full h-20 object-cover">
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer">
                        <img src="{{ $product['image'] }}" alt="Thumbnail" class="w-full h-20 object-cover">
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer">
                        <img src="{{ $product['image'] }}" alt="Thumbnail" class="w-full h-20 object-cover">
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer">
                        <img src="{{ $product['image'] }}" alt="Thumbnail" class="w-full h-20 object-cover">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 mb-2">{{ $product['name'] }}</h1>
                    
                    <!-- Rating -->
                    <div class="flex items-center mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product['rating']))
                                <i class="fas fa-star text-yellow-400 text-lg"></i>
                            @elseif($i <= $product['rating'])
                                <i class="fas fa-star-half-alt text-yellow-400 text-lg"></i>
                            @else
                                <i class="far fa-star text-gray-300 text-lg"></i>
                            @endif
                        @endfor
                        <span class="ml-2 text-slate-600">({{ $product['rating'] }}) • 156 reviews</span>
                    </div>

                    <div class="text-4xl font-bold text-blue-600 mb-6">₹{{ number_format($product['price']) }}</div>
                </div>

                <!-- Description -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-3">Description</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $product['description'] }}</p>
                </div>

                <!-- Features -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-3">Key Features</h3>
                    <ul class="space-y-2">
                        @foreach($product['features'] as $feature)
                        <li class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-slate-600">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Quantity & Add to Cart -->
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center space-x-4 mb-6">
                        <label class="text-slate-700 font-medium">Quantity:</label>
                        <div class="flex items-center border border-slate-300 rounded-lg">
                            <button class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-l-lg">-</button>
                            <input type="number" value="1" min="1" class="w-16 text-center border-l border-r border-slate-300 py-2 focus:outline-none">
                            <button class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-r-lg">+</button>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button onclick="addToCart({{ json_encode($product) }})" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl text-lg">
                            <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                        </button>
                        <button class="w-full bg-gradient-to-r from-orange-500 to-red-600 text-white py-4 rounded-xl font-semibold hover:from-orange-600 hover:to-red-700 transition-all shadow-lg hover:shadow-xl text-lg">
                            <i class="fas fa-bolt mr-2"></i>Buy Now with UTR
                        </button>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-blue-800 mb-3">
                        <i class="fas fa-shield-alt mr-2"></i>Secure UTR Payment
                    </h3>
                    <ul class="space-y-2 text-blue-700">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-600"></i>
                            <span>Transfer via UPI/NEFT</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-600"></i>
                            <span>Upload payment screenshot</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-600"></i>
                            <span>Instant admin verification</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-check text-green-600"></i>
                            <span>Order approved within minutes</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-slate-800 mb-8 text-center">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Add related products here -->
            </div>
        </div>
    </div>
</div>
@endsection