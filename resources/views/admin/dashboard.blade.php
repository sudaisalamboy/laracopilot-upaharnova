@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')
@section('page-description', 'Digital Store overview and key metrics')

@section('content')
<div class="p-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
        <!-- Total Revenue -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Revenue</p>
                    <p class="text-2xl font-bold text-slate-800">${{ number_format($data['stats']['total_revenue'], 2) }}</p>
                    <p class="text-xs text-emerald-600 mt-1">+12.5% from last month</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Orders</p>
                    <p class="text-2xl font-bold text-slate-800">{{ number_format($data['stats']['total_orders']) }}</p>
                    <p class="text-xs text-blue-600 mt-1">+8.2% from last month</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Products -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Active Products</p>
                    <p class="text-2xl font-bold text-slate-800">{{ number_format($data['stats']['active_products']) }}</p>
                    <p class="text-xs text-purple-600 mt-1">+15 new this month</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Customers</p>
                    <p class="text-2xl font-bold text-slate-800">{{ number_format($data['stats']['total_customers']) }}</p>
                    <p class="text-xs text-orange-600 mt-1">+5.7% from last month</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pending Orders -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Pending Orders</p>
                    <p class="text-2xl font-bold text-slate-800">{{ number_format($data['stats']['pending_orders']) }}</p>
                    <p class="text-xs text-red-600 mt-1">Requires attention</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Downloads -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Downloads</p>
                    <p class="text-2xl font-bold text-slate-800">{{ number_format($data['stats']['total_downloads']) }}</p>
                    <p class="text-xs text-teal-600 mt-1">+23.1% from last month</p>
                </div>
                <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">
        <!-- Revenue Chart (Fixed Dimensions) -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Revenue Analytics</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="revenueChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-slate-500 mt-4">*Fixed dimensions optimized for desktop viewing</p>
        </div>

        <!-- Top Products Chart (Fixed Dimensions) -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Top Products Performance</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="productsChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-slate-500 mt-4">*Scroll horizontally on smaller screens</p>
        </div>
    </div>

    <!-- Recent Orders & Top Products -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
        <!-- Recent Orders -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
            <div class="p-6 border-b border-slate-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-800">Recent Orders</h3>
                    <a href="{{ route('admin.orders') }}" class="text-purple-600 hover:text-purple-700 font-medium text-sm">View All</a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($data['recent_orders'] as $order)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="font-medium text-slate-800">{{ $order['id'] }}</p>
                                    <span class="px-2 py-1 text-xs rounded-full
                                        @if($order['status'] == 'completed') bg-green-100 text-green-800
                                        @elseif($order['status'] == 'processing') bg-blue-100 text-blue-800
                                        @else bg-orange-100 text-orange-800 @endif">
                                        {{ ucfirst($order['status']) }}
                                    </span>
                                </div>
                                <p class="text-sm text-slate-600">{{ $order['customer'] }}</p>
                                <p class="text-xs text-slate-500">{{ $order['product'] }}</p>
                            </div>
                            <div class="text-right ml-4">
                                <p class="font-semibold text-slate-800">${{ $order['amount'] }}</p>
                                <p class="text-xs text-slate-500">{{ $order['date'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
            <div class="p-6 border-b border-slate-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-800">Top Selling Products</h3>
                    <a href="{{ route('admin.products') }}" class="text-purple-600 hover:text-purple-700 font-medium text-sm">View All</a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($data['top_products'] as $product)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                            <div class="flex-1">
                                <p class="font-medium text-slate-800 mb-1">{{ $product['name'] }}</p>
                                <p class="text-sm text-slate-600">{{ $product['sales'] }} sales</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-slate-800">${{ number_format($product['revenue'], 2) }}</p>
                                <p class="text-xs text-slate-500">Revenue</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js for Fixed Dimension Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Revenue Chart (Fixed Dimensions)
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [12500, 15600, 18900, 22300, 19800, 25400],
                borderColor: '#8B5CF6',
                backgroundColor: 'rgba(139, 92, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Products Chart (Fixed Dimensions)
    const productsCtx = document.getElementById('productsChart').getContext('2d');
    new Chart(productsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Web Templates', 'Courses', 'UI Kits', 'E-books'],
            datasets: [{
                data: [234, 189, 156, 298],
                backgroundColor: [
                    '#8B5CF6',
                    '#3B82F6',
                    '#10B981',
                    '#F59E0B'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection