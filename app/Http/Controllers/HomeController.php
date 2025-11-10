<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'featured_products' => [
                [
                    'id' => 1,
                    'title' => 'Premium Web Templates Bundle',
                    'description' => 'Complete collection of modern responsive web templates',
                    'price' => 49.99,
                    'original_price' => 99.99,
                    'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400',
                    'downloads' => 2847,
                    'rating' => 4.8,
                    'category' => 'Web Templates'
                ],
                [
                    'id' => 2,
                    'title' => 'Digital Marketing Course',
                    'description' => 'Complete digital marketing masterclass with 50+ video lessons',
                    'price' => 79.99,
                    'original_price' => 149.99,
                    'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=400',
                    'downloads' => 1923,
                    'rating' => 4.9,
                    'category' => 'Online Courses'
                ],
                [
                    'id' => 3,
                    'title' => 'Mobile App UI Kit',
                    'description' => 'Modern mobile app design components and screens',
                    'price' => 29.99,
                    'original_price' => 59.99,
                    'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400',
                    'downloads' => 3456,
                    'rating' => 4.7,
                    'category' => 'Design Assets'
                ],
                [
                    'id' => 4,
                    'title' => 'E-book: Passive Income Guide',
                    'description' => 'Complete guide to building multiple passive income streams',
                    'price' => 19.99,
                    'original_price' => 39.99,
                    'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400',
                    'downloads' => 5678,
                    'rating' => 4.6,
                    'category' => 'E-books'
                ]
            ],
            'categories' => [
                ['name' => 'Web Templates', 'count' => 234, 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['name' => 'Online Courses', 'count' => 156, 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['name' => 'Design Assets', 'count' => 189, 'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z'],
                ['name' => 'E-books', 'count' => 298, 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253']
            ],
            'stats' => [
                'total_products' => 1247,
                'happy_customers' => 15683,
                'total_downloads' => 234567,
                'seller_earnings' => 1250000
            ],
            'testimonials' => [
                [
                    'name' => 'Sarah Johnson',
                    'role' => 'Web Developer',
                    'content' => 'Amazing collection of templates! Saved me weeks of development time.',
                    'rating' => 5,
                    'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100'
                ],
                [
                    'name' => 'Mike Chen',
                    'role' => 'Digital Marketer',
                    'content' => 'The marketing course was incredibly detailed and practical. Highly recommend!',
                    'rating' => 5,
                    'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100'
                ],
                [
                    'name' => 'Emma Davis',
                    'role' => 'UI/UX Designer',
                    'content' => 'Perfect design assets for my projects. Great quality and instant download!',
                    'rating' => 5,
                    'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100'
                ]
            ]
        ];

        return view('welcome', compact('data'));
    }
}