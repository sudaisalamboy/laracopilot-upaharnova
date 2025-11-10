<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    private $adminUsers = [
        [
            'email' => 'admin@digitalstore.com',
            'password' => 'admin123',
            'name' => 'Store Administrator',
            'role' => 'Super Admin'
        ],
        [
            'email' => 'manager@digitalstore.com',
            'password' => 'manager123',
            'name' => 'Store Manager',
            'role' => 'Manager'
        ],
        [
            'email' => 'support@digitalstore.com',
            'password' => 'support123',
            'name' => 'Support Staff',
            'role' => 'Support'
        ]
    ];

    public function showLogin()
    {
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login', ['credentials' => $this->adminUsers]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        foreach ($this->adminUsers as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                Session::put('admin_logged_in', true);
                Session::put('admin_user', $user);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['credentials' => 'Invalid admin credentials']);
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_user');
        return redirect()->route('admin.login');
    }
}