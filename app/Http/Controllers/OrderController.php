<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Generate random order ID
        $orderId = 'ORD' . rand(10000, 99999);
        
        // Store order in session (in real app, save to database)
        session(['order_' . $orderId => [
            'id' => $orderId,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'total_amount' => $request->total_amount,
            'utr_number' => $request->utr_number,
            'payment_screenshot' => $request->payment_screenshot,
            'status' => 'pending',
            'created_at' => now()
        ]]);

        return redirect()->route('order.status', $orderId);
    }

    public function orderStatus($id)
    {
        $order = session('order_' . $id);
        
        if (!$order) {
            abort(404);
        }

        return view('order-status', compact('order'));
    }
}