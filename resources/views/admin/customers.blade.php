@extends('layouts.admin')

@section('title', 'Customers Management - Admin Panel')
@section('page-title', 'Customers Management')
@section('page-description', 'Manage customer accounts and view their purchase history')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Total Customers</p>
                <p class="text-3xl font-bold text-slate-800">{{ count($customers) }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Active Customers</p>
                <p class="text-3xl font-bold text-green-600">{{ count($customers) }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-user-check text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Total Revenue</p>
                <p class="text-3xl font-bold text-purple-600">₹{{ number_format(collect($customers)->sum('total_spent')) }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-rupee-sign text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Avg. Order Value</p>
                <p class="text-3xl font-bold text-orange-600">
                    ₹{{ number_format(collect($customers)->sum('total_spent') / collect($customers)->sum('orders')) }}
                </p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-chart-line text-orange-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Customers Table -->
<div class="bg-white rounded-2xl shadow-lg border border-slate-100">
    <div class="p-6 border-b border-slate-100">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-slate-800">Customer Database</h2>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search customers..." class="pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Orders</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Total Spent</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                @foreach($customers as $customer)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-12 w-12">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                                    <span class="text-white font-semibold">{{ substr($customer['name'], 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-slate-800">{{ $customer['name'] }}</div>
                                <div class="text-sm text-slate-500">ID: {{ $customer['id'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div>
                            <div class="text-sm text-slate-800">{{ $customer['email'] }}</div>
                            <div class="text-sm text-slate-500">{{ $customer['phone'] }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-blue-600">{{ $customer['orders'] }} orders</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-green-600">₹{{ number_format($customer['total_spent']) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check mr-1"></i>Active
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-3">
                            <button onclick="viewCustomer({{ $customer['id'] }})" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="editCustomer({{ $customer['id'] }})" class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="viewOrders({{ $customer['id'] }})" class="text-purple-600 hover:text-purple-900">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                            <button onclick="deleteCustomer({{ $customer['id'] }})" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-slate-100">
        <div class="flex items-center justify-between">
            <div class="text-sm text-slate-700">
                Showing <strong>1</strong> to <strong>{{ count($customers) }}</strong> of <strong>{{ count($customers) }}</strong> results
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 rounded-lg hover:bg-slate-50">
                    Previous
                </button>
                <button class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg">
                    1
                </button>
                <button class="px-3 py-2 text-sm font-medium text-slate-500 bg-white border border-slate-300 rounded-lg hover:bg-slate-50">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function viewCustomer(customerId) {
    alert('View customer details for ID: ' + customerId);
    // In real app, open customer detail modal
}

function editCustomer(customerId) {
    alert('Edit customer functionality for ID: ' + customerId);
    // In real app, open edit modal or navigate to edit page
}

function viewOrders(customerId) {
    alert('View orders for customer ID: ' + customerId);
    // In real app, filter orders by customer
}

function deleteCustomer(customerId) {
    if (confirm('Are you sure you want to delete this customer? This action cannot be undone.')) {
        alert('Delete functionality would be implemented here for ID: ' + customerId);
        // In real app, make DELETE request
    }
}
</script>
@endsection