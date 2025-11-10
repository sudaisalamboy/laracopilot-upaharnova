<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        // Simple session check - redirect if not logged in
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
    }

    public function dashboard()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'stats' => [
                'total_revenue' => 125430.50,
                'total_orders' => 2847,
                'active_products' => 456,
                'total_customers' => 1893,
                'pending_orders' => 23,
                'total_downloads' => 45678
            ],
            'recent_orders' => [
                ['id' => '#ORD-001', 'customer' => 'John Smith', 'product' => 'Web Template Bundle', 'amount' => 49.99, 'status' => 'completed', 'date' => '2024-01-15'],
                ['id' => '#ORD-002', 'customer' => 'Sarah Wilson', 'product' => 'Digital Marketing Course', 'amount' => 79.99, 'status' => 'processing', 'date' => '2024-01-15'],
                ['id' => '#ORD-003', 'customer' => 'Mike Johnson', 'product' => 'UI Kit Collection', 'amount' => 29.99, 'status' => 'completed', 'date' => '2024-01-14'],
                ['id' => '#ORD-004', 'customer' => 'Emma Davis', 'product' => 'E-book Bundle', 'amount' => 19.99, 'status' => 'pending', 'date' => '2024-01-14']
            ],
            'top_products' => [
                ['name' => 'Premium Web Templates', 'sales' => 234, 'revenue' => 11696.66],
                ['name' => 'Digital Marketing Course', 'sales' => 189, 'revenue' => 15111.11],
                ['name' => 'Mobile App UI Kit', 'sales' => 156, 'revenue' => 4678.44],
                ['name' => 'Passive Income E-book', 'sales' => 298, 'revenue' => 5950.02]
            ]
        ];

        return view('admin.dashboard', compact('data'));
    }

    public function products()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'stats' => [
                'total_products' => 456,
                'active_products' => 423,
                'draft_products' => 33,
                'total_downloads' => 45678
            ],
            'products' => [
                ['id' => 1, 'title' => 'Premium Web Templates Bundle', 'category' => 'Web Templates', 'price' => 49.99, 'downloads' => 2847, 'status' => 'active', 'created' => '2024-01-10'],
                ['id' => 2, 'title' => 'Digital Marketing Course', 'category' => 'Online Courses', 'price' => 79.99, 'downloads' => 1923, 'status' => 'active', 'created' => '2024-01-08'],
                ['id' => 3, 'title' => 'Mobile App UI Kit', 'category' => 'Design Assets', 'price' => 29.99, 'downloads' => 3456, 'status' => 'active', 'created' => '2024-01-05'],
                ['id' => 4, 'title' => 'E-book: Passive Income Guide', 'category' => 'E-books', 'price' => 19.99, 'downloads' => 5678, 'status' => 'draft', 'created' => '2024-01-03']
            ]
        ];

        return view('admin.products', compact('data'));
    }

    public function orders()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'stats' => [
                'total_orders' => 2847,
                'pending_orders' => 23,
                'completed_orders' => 2756,
                'refunded_orders' => 68
            ],
            'orders' => [
                ['id' => '#ORD-001', 'customer' => 'John Smith', 'email' => 'john@email.com', 'product' => 'Web Template Bundle', 'amount' => 49.99, 'status' => 'completed', 'date' => '2024-01-15 10:30 AM'],
                ['id' => '#ORD-002', 'customer' => 'Sarah Wilson', 'email' => 'sarah@email.com', 'product' => 'Digital Marketing Course', 'amount' => 79.99, 'status' => 'processing', 'date' => '2024-01-15 09:15 AM'],
                ['id' => '#ORD-003', 'customer' => 'Mike Johnson', 'email' => 'mike@email.com', 'product' => 'UI Kit Collection', 'amount' => 29.99, 'status' => 'completed', 'date' => '2024-01-14 03:45 PM'],
                ['id' => '#ORD-004', 'customer' => 'Emma Davis', 'email' => 'emma@email.com', 'product' => 'E-book Bundle', 'amount' => 19.99, 'status' => 'pending', 'date' => '2024-01-14 02:20 PM']
            ]
        ];

        return view('admin.orders', compact('data'));
    }

    public function customers()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'stats' => [
                'total_customers' => 1893,
                'new_customers' => 45,
                'active_customers' => 1678,
                'vip_customers' => 234
            ],
            'customers' => [
                ['id' => 1, 'name' => 'John Smith', 'email' => 'john@email.com', 'orders' => 5, 'total_spent' => 249.95, 'status' => 'active', 'joined' => '2023-12-15'],
                ['id' => 2, 'name' => 'Sarah Wilson', 'email' => 'sarah@email.com', 'orders' => 12, 'total_spent' => 679.88, 'status' => 'vip', 'joined' => '2023-11-20'],
                ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@email.com', 'orders' => 3, 'total_spent' => 89.97, 'status' => 'active', 'joined' => '2024-01-05'],
                ['id' => 4, 'name' => 'Emma Davis', 'email' => 'emma@email.com', 'orders' => 8, 'total_spent' => 399.92, 'status' => 'vip', 'joined' => '2023-10-12']
            ]
        ];

        return view('admin.customers', compact('data'));
    }

    public function downloads()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'stats' => [
                'total_downloads' => 45678,
                'today_downloads' => 234,
                'this_week' => 1567,
                'this_month' => 6789
            ],
            'recent_downloads' => [
                ['product' => 'Web Template Bundle', 'customer' => 'John Smith', 'download_time' => '2024-01-15 10:35 AM', 'ip_address' => '192.168.1.1', 'file_size' => '25.6 MB'],
                ['product' => 'Digital Marketing Course', 'customer' => 'Sarah Wilson', 'download_time' => '2024-01-15 09:20 AM', 'ip_address' => '192.168.1.2', 'file_size' => '1.2 GB'],
                ['product' => 'UI Kit Collection', 'customer' => 'Mike Johnson', 'download_time' => '2024-01-14 03:50 PM', 'ip_address' => '192.168.1.3', 'file_size' => '45.8 MB'],
                ['product' => 'E-book Bundle', 'customer' => 'Emma Davis', 'download_time' => '2024-01-14 02:25 PM', 'ip_address' => '192.168.1.4', 'file_size' => '12.3 MB']
            ]
        ];

        return view('admin.downloads', compact('data'));
    }

    public function categories()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'categories' => [
                ['id' => 1, 'name' => 'Web Templates', 'products' => 234, 'total_sales' => 11696.66, 'status' => 'active'],
                ['id' => 2, 'name' => 'Online Courses', 'products' => 156, 'total_sales' => 15111.11, 'status' => 'active'],
                ['id' => 3, 'name' => 'Design Assets', 'products' => 189, 'total_sales' => 4678.44, 'status' => 'active'],
                ['id' => 4, 'name' => 'E-books', 'products' => 298, 'total_sales' => 5950.02, 'status' => 'active']
            ]
        ];

        return view('admin.categories', compact('data'));
    }

    public function analytics()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'revenue_data' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                'data' => [12500, 15600, 18900, 22300, 19800, 25400]
            ],
            'top_countries' => [
                ['country' => 'United States', 'sales' => 45.2, 'revenue' => 56789.50],
                ['country' => 'United Kingdom', 'sales' => 18.7, 'revenue' => 23456.75],
                ['country' => 'Canada', 'sales' => 12.3, 'revenue' => 15432.25],
                ['country' => 'Australia', 'sales' => 8.9, 'revenue' => 11234.00]
            ]
        ];

        return view('admin.analytics', compact('data'));
    }

    public function settings()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $data = [
            'settings' => [
                'site_name' => 'Digital Store',
                'site_email' => 'admin@digitalstore.com',
                'currency' => 'USD',
                'tax_rate' => 8.5,
                'download_limit' => 5,
                'file_size_limit' => 500
            ]
        ];

        return view('admin.settings', compact('data'));
    }
}