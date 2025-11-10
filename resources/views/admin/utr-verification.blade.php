@extends('layouts.admin')

@section('title', 'UTR Verification - Admin Panel')
@section('page-title', 'UTR Verification')
@section('page-description', 'Verify and approve pending UTR payments')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Pending Verification</p>
                <p class="text-3xl font-bold text-red-600">{{ count($pendingUtrs) }}</p>
            </div>
            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-clock text-red-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div>
            <p class="text-sm font-medium text-slate-600">Verified Today</p>
            <p class="text-3xl font-bold text-green-600">8</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div>
            <p class="text-sm font-medium text-slate-600">Total Amount</p>
            <p class="text-3xl font-bold text-blue-600">₹1,10,997</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
        <div>
            <p class="text-sm font-medium text-slate-600">Success Rate</p>
            <p class="text-3xl font-bold text-purple-600">98.5%</p>
        </div>
    </div>
</div>

<!-- Pending UTRs -->
<div class="bg-white rounded-2xl shadow-lg border border-slate-100">
    <div class="p-6 border-b border-slate-100">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-slate-800">Pending UTR Verifications</h2>
            <div class="flex items-center space-x-4">
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-check-double mr-2"></i>Approve All
                </button>
                <button class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">
                    <i class="fas fa-refresh mr-2"></i>Refresh
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        @if(count($pendingUtrs) > 0)
        <div class="space-y-6">
            @foreach($pendingUtrs as $utr)
            <div class="border border-slate-200 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Order Details -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-slate-800">{{ $utr['order_id'] }}</h3>
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-slate-600 font-medium">Customer:</label>
                                <p class="text-slate-800">{{ $utr['customer'] }}</p>
                            </div>
                            <div>
                                <label class="text-slate-600 font-medium">Amount:</label>
                                <p class="text-2xl font-bold text-blue-600">₹{{ number_format($utr['amount']) }}</p>
                            </div>
                            <div>
                                <label class="text-slate-600 font-medium">UTR Number:</label>
                                <p class="text-slate-800 font-mono">{{ $utr['utr'] }}</p>
                            </div>
                            <div>
                                <label class="text-slate-600 font-medium">Date & Time:</label>
                                <p class="text-slate-800">{{ $utr['date'] }}</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-6">
                            <button onclick="approveOrder('{{ $utr['order_id'] }}')" class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-green-700 hover:to-emerald-700 transition-all shadow-lg hover:shadow-xl">
                                <i class="fas fa-check mr-2"></i>Approve Order
                            </button>
                            <button onclick="rejectOrder('{{ $utr['order_id'] }}')" class="flex-1 bg-gradient-to-r from-red-600 to-pink-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-red-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl">
                                <i class="fas fa-times mr-2"></i>Reject Order
                            </button>
                        </div>
                    </div>

                    <!-- Payment Screenshot -->
                    <div class="bg-slate-50 rounded-xl p-4">
                        <h4 class="font-semibold text-slate-800 mb-3">Payment Screenshot</h4>
                        <div class="bg-white rounded-lg p-2 border border-slate-200">
                            <img src="{{ $utr['screenshot'] }}" alt="Payment Screenshot" class="w-full h-64 object-cover rounded-lg cursor-pointer" onclick="viewScreenshot('{{ $utr['screenshot'] }}')">
                        </div>
                        <button onclick="viewScreenshot('{{ $utr['screenshot'] }}')" class="w-full mt-3 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-expand mr-2"></i>View Full Size
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check-circle text-green-600 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-slate-800 mb-2">All UTRs Verified!</h3>
            <p class="text-slate-600">No pending UTR verifications at the moment.</p>
        </div>
        @endif
    </div>
</div>

<!-- Screenshot Modal -->
<div id="screenshotModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-4xl max-h-full overflow-auto">
        <div class="p-4 border-b flex items-center justify-between">
            <h3 class="text-lg font-semibold">Payment Screenshot</h3>
            <button onclick="closeScreenshot()" class="text-slate-500 hover:text-slate-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-4">
            <img id="modalScreenshot" src="" alt="Payment Screenshot" class="w-full max-w-2xl mx-auto">
        </div>
    </div>
</div>

<script>
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
    if (confirm('Are you sure you want to reject this order? This action cannot be undone.')) {
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

function viewScreenshot(imageUrl) {
    $('#modalScreenshot').attr('src', imageUrl);
    $('#screenshotModal').removeClass('hidden');
}

function closeScreenshot() {
    $('#screenshotModal').addClass('hidden');
}

// Close modal on ESC key
$(document).keyup(function(e) {
    if (e.keyCode === 27) {
        closeScreenshot();
    }
});
</script>
@endsection