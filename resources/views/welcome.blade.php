@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-purple-900 to-blue-900">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center text-white max-w-6xl mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white via-blue-100 to-purple-200">
            Shop with Confidence
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-blue-100">
            Secure UTR payments • Instant verification • Premium products
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('products') }}" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-shopping-bag mr-2"></i>Shop Now
            </a>
            <button class="bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300">
                <i class="fas fa-play mr-2"></i>Watch Demo
            </button>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-br from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">Why Choose ShopEasy?</h2>
            <p class="text-xl text-slate-600">Secure shopping with instant UTR payment verification</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white/90 backdrop-blur-md rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 border border-blue-200/50">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Secure UTR Payments</h3>
                <p class="text-slate-600 mb-6">Safe bank transfer payments with UTR verification. Your money is protected with our advanced security system.</p>
                <div class="flex items-center text-blue-600 font-semibold">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white/90 backdrop-blur-md rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 border border-green-200/50">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bolt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Instant Verification</h3>
                <p class="text-slate-600 mb-6">Upload payment screenshot and get instant admin verification. No waiting, quick approval process.</p>
                <div class="flex items-center text-green-600 font-semibold">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white/90 backdrop-blur-md rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 border border-purple-200/50">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-star text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Premium Quality</h3>
                <p class="text-slate-600 mb-6">Curated selection of premium products with quality guarantee and excellent customer support.</p>
                <div class="flex items-center text-purple-600 font-semibold">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">Featured Products</h2>
            <p class="text-xl text-slate-600">Discover our best-selling premium products</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-star mr-1"></i>{{ $product['rating'] }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">{{ $product['name'] }}</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-4">₹{{ number_format($product['price']) }}</p>
                    <div class="flex gap-2">
                        <button onclick="addToCart({{ json_encode($product) }})" class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-2 px-4 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all">
                            <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                        </button>
                        <a href="{{ route('product.detail', $product['id']) }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products') }}" class="bg-gradient-to-r from-slate-700 to-slate-900 text-white px-8 py-4 rounded-xl font-semibold hover:from-slate-800 hover:to-black transition-all shadow-lg hover:shadow-xl">
                <i class="fas fa-shopping-bag mr-2"></i>View All Products
            </a>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-20 bg-gradient-to-br from-blue-50 to-purple-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">How UTR Payment Works</h2>
            <p class="text-xl text-slate-600">Simple, secure, and instant payment process</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">1</div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Select Products</h3>
                <p class="text-slate-600">Choose your favorite products and add them to cart</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">2</div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Make Payment</h3>
                <p class="text-slate-600">Transfer amount via UPI/NEFT and get UTR number</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">3</div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Upload Screenshot</h3>
                <p class="text-slate-600">Upload payment screenshot with UTR details</p>
            </div>

            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">4</div>
                <h3 class="text-xl font-semibold text-slate-800 mb-3">Get Approved</h3>
                <p class="text-slate-600">Admin verifies and approves your order instantly</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-bold text-slate-800 mb-6">About ShopEasy</h2>
                <p class="text-lg text-slate-600 mb-6 leading-relaxed">
                    We're revolutionizing online shopping with secure UTR payment systems. Our platform ensures 
                    your transactions are safe while providing instant verification for a seamless shopping experience.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <span class="text-slate-700">Secure UTR payment verification</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <span class="text-slate-700">24/7 customer support</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <span class="text-slate-700">Premium product guarantee</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600" alt="About Us" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white">
                    <div class="text-center">
                        <div class="text-2xl font-bold">5K+</div>
                        <div class="text-sm">Happy Customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-br from-slate-800 to-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Get In Touch</h2>
            <p class="text-xl text-slate-300">Have questions about UTR payments? We're here to help!</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-phone text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Phone Support</h3>
                        <p class="text-slate-300">+91 9876543210</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Email Support</h3>
                        <p class="text-slate-300">support@shopeasy.com</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Working Hours</h3>
                        <p class="text-slate-300">24/7 Support Available</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8">
                <form class="space-y-6">
                    <div>
                        <input type="text" placeholder="Your Name" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <input type="email" placeholder="Your Email" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <textarea placeholder="Your Message" rows="4" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection