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
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'product' => 'required|array',
            'product.*' => 'required|string',
            'status' => 'required|string',
            'total' => 'required|numeric',
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