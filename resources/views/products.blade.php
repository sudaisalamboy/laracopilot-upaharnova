@extends('layouts.app')

@section('title', 'Products - ShopEasy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-slate-800 mb-4">Our Products</h1>
            <p class="text-xl text-slate-600">Discover premium products with secure UTR payment options</p>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex flex-wrap gap-4">
                    <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>All Categories</option>
                        <option>Electronics</option>
                        <option>Audio</option>
                        <option>Wearables</option>
                        <option>Computers</option>
                    </select>
                    <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Price Range</option>
                        <option>Under ₹10,000</option>
                        <option>₹10,000 - ₹30,000</option>
                        <option>₹30,000 - ₹50,000</option>
                        <option>Above ₹50,000</option>
                    </select>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-slate-600">{{ count($products) }} products found</span>
                    <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Sort by: Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Rating</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-star mr-1"></i>{{ $product['rating'] }}
                    </div>
                    <div class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $product['category'] }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">{{ $product['name'] }}</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-4">₹{{ number_format($product['price']) }}</p>
                    
                    <!-- Rating -->
                    <div class="flex items-center mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product['rating']))
                                <i class="fas fa-star text-yellow-400"></i>
                            @elseif($i <= $product['rating'])
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            @else
                                <i class="far fa-star text-gray-300"></i>
                            @endif
                        @endfor
                        <span class="ml-2 text-sm text-slate-600">({{ $product['rating'] }})</span>
                    </div>

                    <div class="flex gap-2">
                        <button onclick="addToCart({{ json_encode($product) }})" class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all">
                            <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                        </button>
                        <a href="{{ route('product.detail', $product['id']) }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 py-3 px-4 rounded-lg transition-colors">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More -->
        <div class="text-center mt-12">
            <button class="bg-gradient-to-r from-slate-700 to-slate-900 text-white px-8 py-4 rounded-xl font-semibold hover:from-slate-800 hover:to-black transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-plus mr-2"></i>Load More Products
            </button>
        </div>
    </div>
</div>
@endsection