@extends('layouts.admin')

@section('title', 'Downloads Tracking - Digital Store')
@section('page-title', 'Downloads Tracking')
@section('page-description', 'Monitor and manage digital product downloads')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Downloads</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($stats['total_downloads']) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Unique Downloads</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($stats['unique_downloads']) }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Today's Downloads</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($stats['today_downloads']) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Bandwidth</p>
                    <p class="text-3xl font-bold text-slate-800">{{ $stats['total_bandwidth'] }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Downloads Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-slate-800">Recent Downloads</h2>
                <div class="flex space-x-2">
                    <input type="text" placeholder="Search downloads..." class="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300">
                        Export
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Order ID</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Customer</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Product</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">File</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Size</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Downloads</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Last Download</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">IP Address</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-slate-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($downloads as $download)
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="py-4 px-4">
                                <span class="font-medium text-indigo-600">{{ $download['order_id'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-700">{{ $download['customer'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-700">{{ $download['product'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-600 text-sm font-mono">{{ $download['file_name'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-600">{{ $download['file_size'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-semibold text-slate-800">{{ $download['download_count'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-600 text-sm">{{ date('M j, Y H:i', strtotime($download['last_download'])) }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-slate-600 font-mono text-sm">{{ $download['ip_address'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-800">
                                    {{ ucfirst($download['status']) }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-700" title="View Details">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-700" title="Revoke Access">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection