@extends('layouts.admin')

@section('title', 'Orders Management - Admin Panel')
@section('page-title', 'Orders Management')
@section('page-description', 'Manage all customer orders and track their status')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Total Orders</p>
                <p class="text-3xl font-bold text-slate-800">{{ count($orders) }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-shopping-cart text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Pending Orders</p>
                <p class="text-3xl font-bold text-yellow-600">
                    {{ collect($orders)->where('status', 'pending')->count() }}
                </p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Approved Orders</p>
                <p class="text-3xl font-bold text-green-600">
                    {{ collect($orders)->where('status', 'approved')->count() }}
                </p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Rejected Orders</p>
                <p class="text-3xl font-bold text-red-600">
                    {{ collect($orders)->where('status', 'rejected')->count() }}
                </p>
            </div>
            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-times-circle text-red-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Orders Table -->
<div class="bg-white rounded-2xl shadow-lg border border-slate-100">
    <div class="p-6 border-b border-slate-100">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-slate-800">All Orders</h2>
            <div class="flex items-center space-x-4">
                <select class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>All Status</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                </select>
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
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Order ID</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">UTR</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                @foreach($orders as $order)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-slate-800">{{ $order['id'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div>
                            <div class="text-sm font-medium text-slate-800">{{ $order['customer'] }}</div>
                            <div class="text-sm text-slate-500">{{ $order['email'] }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-blue-600">₹{{ number_format($order['amount']) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-mono text-slate-800">{{ $order['utr'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-slate-800">{{ $order['date'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($order['status'] == 'pending')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                        @elseif($order['status'] == 'approved')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check mr-1"></i>Approved
                            </span>
                        @elseif($order['status'] == 'rejected')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <i class="fas fa-times mr-1"></i>Rejected
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <button onclick="viewOrder('{{ $order['id'] }}')" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </button>
                            @if($order['status'] == 'pending')
                                <button onclick="approveOrder('{{ $order['id'] }}')" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button onclick="rejectOrder('{{ $order['id'] }}')" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                            <button onclick="deleteOrder('{{ $order['id'] }}')" class="text-slate-600 hover:text-slate-900">
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
                Showing <strong>1</strong> to <strong>{{ count($orders) }}</strong> of <strong>{{ count($orders) }}</strong> results
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
function viewOrder(orderId) {
    alert('View order details for: ' + orderId);
    // In real app, open modal or navigate to order detail page
}

function approveOrder(orderId) {
    if (confirm('Are you sure you want to approve this order?')) {
        $.post('{{ url("/admin/approve-order") }}/' + orderId, {
            _token: '{{ csrf_token() }}'
        }).done(function(response) {
            if (response.success) {
                alert('Order approved successfully!');
                location.reload();
            }
        });
    }
}

function rejectOrder(orderId) {
    if (confirm('Are you sure you want to reject this order?')) {
        $.post('{{ url("/admin/reject-order") }}/' + orderId, {
            _token: '{{ csrf_token() }}'
        }).done(function(response) {
            if (response.success) {
                alert('Order rejected successfully!');
                location.reload();
            }
        });
    }
}

function deleteOrder(orderId) {
    if (confirm('Are you sure you want to delete this order? This action cannot be undone.')) {
        alert('Delete functionality would be implemented here.');
        // In real app, make DELETE request
    }
}
</script>
@endsection