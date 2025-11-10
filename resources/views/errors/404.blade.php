@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-blue-50 flex items-center justify-center px-4">
    <div class="text-center max-w-2xl mx-auto">
        <!-- 404 Icon -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-r from-purple-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                </svg>
            </div>
        </div>

        <!-- Error Content -->
        <h1 class="text-4xl md:text-6xl font-bold text-slate-800 mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-slate-600 mb-6">Digital Product Not Found</h2>
        <p class="text-lg text-slate-500 mb-8 leading-relaxed">
            Sorry, the digital product or page you are looking for doesn't exist or has been moved. 
            Let's help you find what you're looking for!
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="/" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Browse Products
            </a>
            <button onclick="history.back()" class="inline-flex items-center px-6 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Go Back
            </button>
        </div>

        <!-- Search Box -->
        <div class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" placeholder="Search digital products..." class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Popular Categories -->
        <div class="mt-12">
            <h3 class="text-lg font-semibold text-slate-700 mb-4">Popular Categories</h3>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="#" class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-purple-200 rounded-lg text-sm text-purple-700 hover:bg-purple-50 transition-colors duration-300">Web Templates</a>
                <a href="#" class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-purple-200 rounded-lg text-sm text-purple-700 hover:bg-purple-50 transition-colors duration-300">Online Courses</a>
                <a href="#" class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-purple-200 rounded-lg text-sm text-purple-700 hover:bg-purple-50 transition-colors duration-300">Design Assets</a>
                <a href="#" class="px-4 py-2 bg-white/80 backdrop-blur-sm border border-purple-200 rounded-lg text-sm text-purple-700 hover:bg-purple-50 transition-colors duration-300">E-books</a>
            </div>
        </div>
    </div>
</div>
@endsection