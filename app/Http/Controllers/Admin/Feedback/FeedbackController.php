<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index()
    {
        
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }
   
     



}
