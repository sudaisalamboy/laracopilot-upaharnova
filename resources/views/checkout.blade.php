@extends('layouts.app')

@section('title', 'Checkout - ShopEasy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-12">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Secure Checkout</h1>
            <p class="text-slate-600">Complete your order with UTR payment verification</p>
        </div>

        <form action="{{ route('place.order') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @csrf
            
            <!-- Order Form -->
            <div class="space-y-6">
                <!-- Customer Information -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-slate-800 mb-4">
                        <i class="fas fa-user mr-2 text-blue-600"></i>Customer Information
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">Full Name *</label>
                            <input type="text" name="customer_name" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your full name">
                        </div>
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">Email Address *</label>
                            <input type="email" name="customer_email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
                        </div>
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">Phone Number *</label>
                            <input type="tel" name="customer_phone" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your phone number">
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-slate-800 mb-4">
                        <i class="fas fa-map-marker-alt mr-2 text-green-600"></i>Shipping Address
                    </h2>
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Complete Address *</label>
                        <textarea name="address" required rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your complete shipping address"></textarea>
                    </div>
                </div>

                <!-- UTR Payment Details -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl shadow-lg p-6 border border-blue-200">
                    <h2 class="text-xl font-semibold text-slate-800 mb-4">
                        <i class="fas fa-credit-card mr-2 text-purple-600"></i>UTR Payment Details
                    </h2>
                    
                    <!-- Bank Details -->
                    <div class="bg-white rounded-lg p-4 mb-4">
                        <h3 class="font-semibold text-slate-800 mb-2">Transfer to:</h3>
                        <div class="text-sm space-y-1 text-slate-600">
                            <p><strong>Account Name:</strong> ShopEasy Pvt Ltd</p>
                            <p><strong>Account Number:</strong> 1234567890123456</p>
                            <p><strong>IFSC Code:</strong> HDFC0001234</p>
                            <p><strong>UPI ID:</strong> shopeasy@paytm</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">UTR/Transaction ID *</label>
                            <input type="text" name="utr_number" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter UTR number from your bank">
                        </div>
                        <div>
                            <label class="block text-slate-700 font-medium mb-2">Payment Screenshot *</label>
                            <input type="file" name="payment_screenshot" accept="image/*" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-sm text-slate-500 mt-2">Upload clear screenshot of payment confirmation</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-6">
                    <h2 class="text-xl font-semibold text-slate-800 mb-4">
                        <i class="fas fa-shopping-cart mr-2 text-orange-600"></i>Order Summary
                    </h2>
                    
                    <div id="orderSummary" class="space-y-4 mb-6">
                        <p class="text-slate-500 text-center">Loading cart items...</p>
                    </div>

                    <div class="border-t pt-4 space-y-2">
                        <div class="flex justify-between text-slate-600">
                            <span>Subtotal:</span>
                            <span id="subtotal">₹0</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Shipping:</span>
                            <span class="text-green-600">FREE</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Tax:</span>
                            <span id="tax">₹0</span>
                        </div>
                        <div class="border-t pt-2 flex justify-between text-lg font-bold text-slate-800">
                            <span>Total:</span>
                            <span id="total">₹0</span>
                        </div>
                    </div>

                    <input type="hidden" name="total_amount" id="totalAmount">

                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-4 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all shadow-lg hover:shadow-xl text-lg mt-6">
                        <i class="fas fa-lock mr-2"></i>Place Secure Order
                    </button>

                    <!-- Payment Process -->
                    <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <h3 class="font-semibold text-yellow-800 mb-2">
                            <i class="fas fa-info-circle mr-2"></i>Payment Process
                        </h3>
                        <ol class="text-sm text-yellow-700 space-y-1">
                            <li>1. Transfer amount to provided account</li>
                            <li>2. Note down UTR/Transaction ID</li>
                            <li>3. Upload payment screenshot</li>
                            <li>4. Submit order for verification</li>
                            <li>5. Admin will approve within 30 minutes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let subtotal = 0;
    
    if (cart.length === 0) {
        $('#orderSummary').html('<p class="text-slate-500 text-center">Your cart is empty</p>');
        return;
    }
    
    let html = '';
    cart.forEach(item => {
        subtotal += item.price;
        html += `
            <div class="flex items-center space-x-4 p-3 border border-slate-200 rounded-lg">
                <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
                <div class="flex-1">
                    <h4 class="font-medium text-slate-800">${item.name}</h4>
                    <p class="text-blue-600 font-semibold">₹${item.price.toLocaleString()}</p>
                </div>
            </div>
        `;
    });
    
    const tax = Math.round(subtotal * 0.18); // 18% GST
    const total = subtotal + tax;
    
    $('#orderSummary').html(html);
    $('#subtotal').text('₹' + subtotal.toLocaleString());
    $('#tax').text('₹' + tax.toLocaleString());
    $('#total').text('₹' + total.toLocaleString());
    $('#totalAmount').val(total);
});
</script>
@endsection