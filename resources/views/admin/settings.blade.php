@extends('layouts.admin')

@section('title', 'Settings - Admin Panel')
@section('page-title', 'Settings')
@section('page-description', 'Configure your e-commerce store settings')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Settings Navigation -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Settings Categories</h3>
        <nav class="space-y-2">
            <a href="#general" class="flex items-center space-x-3 px-4 py-3 text-blue-600 bg-blue-50 rounded-lg font-medium">
                <i class="fas fa-cog"></i>
                <span>General Settings</span>
            </a>
            <a href="#payment" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-800 hover:bg-slate-50 rounded-lg">
                <i class="fas fa-credit-card"></i>
                <span>Payment Settings</span>
            </a>
            <a href="#notifications" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-800 hover:bg-slate-50 rounded-lg">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </a>
            <a href="#security" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-800 hover:bg-slate-50 rounded-lg">
                <i class="fas fa-shield-alt"></i>
                <span>Security</span>
            </a>
            <a href="#backup" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-800 hover:bg-slate-50 rounded-lg">
                <i class="fas fa-database"></i>
                <span>Backup & Export</span>
            </a>
        </nav>
    </div>

    <!-- Settings Content -->
    <div class="lg:col-span-2 space-y-8">
        <!-- General Settings -->
        <div id="general" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-xl font-semibold text-slate-800 mb-6">General Settings</h3>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Store Name</label>
                        <input type="text" value="ShopEasy" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Store Email</label>
                        <input type="email" value="support@shopeasy.com" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-700 font-medium mb-2">Store Description</label>
                    <textarea rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your premium e-commerce store with secure UTR payment system">Your premium e-commerce store with secure UTR payment system</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Phone Number</label>
                        <input type="tel" value="+91 9876543210" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Currency</label>
                        <select class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>INR (₹)</option>
                            <option>USD ($)</option>
                            <option>EUR (€)</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Save General Settings
                </button>
            </form>
        </div>

        <!-- Payment Settings -->
        <div id="payment" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-xl font-semibold text-slate-800 mb-6">UTR Payment Settings</h3>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Bank Account Name</label>
                        <input type="text" value="ShopEasy Pvt Ltd" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">Account Number</label>
                        <input type="text" value="1234567890123456" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">IFSC Code</label>
                        <input type="text" value="HDFC0001234" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-slate-700 font-medium mb-2">UPI ID</label>
                        <input type="text" value="shopeasy@paytm" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" checked class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700">Auto-approve UTR payments after verification</span>
                    </label>
                </div>

                <div>
                    <label class="block text-slate-700 font-medium mb-2">UTR Verification Timeout (minutes)</label>
                    <input type="number" value="30" class="w-32 px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Save Payment Settings
                </button>
            </form>
        </div>

        <!-- Notification Settings -->
        <div id="notifications" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-xl font-semibold text-slate-800 mb-6">Notification Settings</h3>
            <div class="space-y-6">
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-slate-800">New Order Notifications</h4>
                        <p class="text-sm text-slate-600">Get notified when new orders are placed</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-slate-800">UTR Payment Alerts</h4>
                        <p class="text-sm text-slate-600">Get alerted when UTR payments need verification</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-slate-800">Low Stock Alerts</h4>
                        <p class="text-sm text-slate-600">Get notified when products are running low</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Save Notification Settings
                </button>
            </div>
        </div>
    </div>
</div>
@endsection