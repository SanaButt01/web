<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:orders,email',
           
            'phone_number' => 'string|max:11', // Adjust based on expected format
            'address' => 'string|max:255', // Adjust based on expected length
            'product' => 'required|string|max:255',
            'status' => 'required|in:Pending,Delivered', // Ensure only valid statuses
            'total' => 'required|numeric|min:0',
        ]);

        // Create a new order
        $order = Order::create([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'product' => $request->product,
            'status' => $request->status,
            'total' => $request->total,
        ]);

        // Return response
        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }
}
