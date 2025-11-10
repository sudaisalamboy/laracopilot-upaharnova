@extends('layouts.admin')

@section('title', 'Categories Management - Digital Store')
@section('page-title', 'Categories Management')
@section('page-description', 'Organize your digital product categories')

@section('content')
<div class="space-y-6">
    <!-- Categories Management -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-slate-800">Product Categories</h2>
                <button class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                    Add New Category
                </button>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categories as $category)
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-200 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-lg font-semibold text-slate-800">{{ $category['name'] }}</h3>
                        <div class="flex space-x-2">
                            <button class="text-indigo-600 hover:text-indigo-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-slate-600 text-sm mb-4">{{ $category['description'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-indigo-600">{{ number_format($category['products_count']) }}</span>
                        <span class="text-sm text-slate-500">Products</span>
                    </div>
                    <div class="mt-4">
                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-800">
                            {{ $category['status'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection