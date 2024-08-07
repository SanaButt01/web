<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        // return response()->json($request->toArray());
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }
    public function edit()
    {
        // return response()->json($request->toArray());
        $orders = Order::latest()->get();
        return view('admin.order.status', compact('orders'));
    }

    public function storeStatus(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'status' => 'required|string|max:255',
        ]);

        // Find the order by email
        $order = Order::where('email', $request->email)->first();

        // Check if the order exists
        if (!$order) {
            return redirect()->back()->with('status', 'Order not found.');
        }

        // Update the status
        $order->status = $request->status;
        $order->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Order status updated successfully.');
    }


    public function show(Category $category)
    {
        //
    }


    


     



}
