<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Create a new feedback
        $feedback = Feedback::create([
            'message' => $validatedData['message'],
            'email' => $validatedData['email'],
        ]);

        return response()->json(['feedback' => $feedback, 'message' => 'Feedback submitted successfully'], 201);
    }
    public function index(Request $request)
    {
        // Fetch all feedbacks
        $feedbacks = Feedback::all();

        // Return the feedbacks as a JSON response
        return response()->json($feedbacks);
    }
}
