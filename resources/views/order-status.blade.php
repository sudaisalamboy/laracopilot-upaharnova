@extends('layouts.app')

@section('title', 'Order Status - ShopEasy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-12">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-clock text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Order Submitted Successfully!</h1>
            <p class="text-slate-600">Your order is pending admin verification</p>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-slate-800">Order Details</h2>
                <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full font-semibold">
                    <i class="fas fa-clock mr-2"></i>PENDING VERIFICATION
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Order Info -->
                <div class="space-y-4">
                    <div>
                        <label class="text-slate-600 font-medium">Order ID:</label>
                        <p class="text-lg font-semibold text-slate-800">{{ $order['id'] }}</p>
                    </div>
                    <div>
                        <label class="text-slate-600 font-medium">Customer Name:</label>
                        <p class="text-slate-800">{{ $order['customer_name'] }}</p>
                    </div>
                    <div>
                        <label class="text-slate-600 font-medium">Email:</label>
                        <p class="text-slate-800">{{ $order['customer_email'] }}</p>
                    </div>
                    <div>
                        <label class="text-slate-600 font-medium">Phone:</label>
                        <p class="text-slate-800">{{ $order['customer_phone'] }}</p>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="space-y-4">
                    <div>
                        <label class="text-slate-600 font-medium">Total Amount:</label>
                        <p class="text-2xl font-bold text-blue-600">₹{{ number_format($order['total_amount']) }}</p>
                    </div>
                    <div>
                        <label class="text-slate-600 font-medium">UTR Number:</label>
                        <p class="text-slate-800 font-mono">{{ $order['utr_number'] }}</p>
                    </div>
                    <div>
                        <label class="text-slate-600 font-medium">Order Date:</label>
                        <p class="text-slate-800">{{ $order['created_at']->format('d M Y, h:i A') }}</p>
                    </div>
                    <div>
                        <label class="text-slate-600 font-medium">Status:</label>
                        <p class="text-yellow-600 font-semibold">{{ ucfirst($order['status']) }}</p>
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="mt-8 pt-8 border-t">
                <label class="text-slate-600 font-medium">Shipping Address:</label>
                <p class="text-slate-800 mt-2">{{ $order['address'] }}</p>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h3 class="text-xl font-semibold text-slate-800 mb-6">Order Timeline</h3>
            
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-4 top-8 bottom-8 w-0.5 bg-slate-200"></div>
                
                <!-- Steps -->
                <div class="space-y-8">
                    <!-- Step 1: Order Placed -->
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center relative z-10">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">Order Placed</h4>
                            <p class="text-slate-600">{{ $order['created_at']->format('d M Y, h:i A') }}</p>
                            <p class="text-sm text-green-600">✓ Completed</p>
                        </div>
                    </div>

                    <!-- Step 2: Payment Verification -->
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center relative z-10">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">UTR Verification</h4>
                            <p class="text-slate-600">Admin reviewing payment screenshot</p>
                            <p class="text-sm text-yellow-600">⏳ In Progress</p>
                        </div>
                    </div>

                    <!-- Step 3: Order Approved -->
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-slate-300 rounded-full flex items-center justify-center relative z-10">
                            <i class="fas fa-thumbs-up text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-400">Order Approved</h4>
                            <p class="text-slate-400">Waiting for verification</p>
                            <p class="text-sm text-slate-400">⏱ Pending</p>
                        </div>
                    </div>

                    <!-- Step 4: Processing -->
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-slate-300 rounded-full flex items-center justify-center relative z-10">
                            <i class="fas fa-box text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-400">Order Processing</h4>
                            <p class="text-slate-400">Preparing your order</p>
                            <p class="text-sm text-slate-400">⏱ Pending</p>
                        </div>
                    </div>

                    <!-- Step 5: Shipped -->
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-slate-300 rounded-full flex items-center justify-center relative z-10">
                            <i class="fas fa-shipping-fast text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-400">Shipped</h4>
                            <p class="text-slate-400">Order on the way</p>
                            <p class="text-sm text-slate-400">⏱ Pending</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Important Notice -->
        <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-200">
            <h3 class="text-lg font-semibold text-blue-800 mb-3">
                <i class="fas fa-info-circle mr-2"></i>Important Information
            </h3>
            <ul class="space-y-2 text-blue-700">
                <li class="flex items-start space-x-2">
                    <i class="fas fa-clock mt-1 text-blue-600"></i>
                    <span>Your order is currently pending admin verification. This usually takes 15-30 minutes during business hours.</span>
                </li>
                <li class="flex items-start space-x-2">
                    <i class="fas fa-shield-alt mt-1 text-green-600"></i>
                    <span>Your UTR payment has been recorded and is being verified by our team.</span>
                </li>
                <li class="flex items-start space-x-2">
                    <i class="fas fa-envelope mt-1 text-purple-600"></i>
                    <span>You will receive email and SMS notifications once your order is approved.</span>
                </li>
                <li class="flex items-start space-x-2">
                    <i class="fas fa-phone mt-1 text-orange-600"></i>
                    <span>For urgent queries, contact us at +91 9876543210</span>
                </li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
            <a href="{{ route('products') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transition-all text-center">
                <i class="fas fa-shopping-bag mr-2"></i>Continue Shopping
            </a>
            <button onclick="location.reload()" class="bg-white border border-slate-300 text-slate-700 px-8 py-3 rounded-xl font-semibold hover:bg-slate-50 transition-all">
                <i class="fas fa-refresh mr-2"></i>Refresh Status
            </button>
        </div>
    </div>
</div>
@endsection