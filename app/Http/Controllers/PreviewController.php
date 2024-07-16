<?php

namespace App\Http\Controllers;

use App\Models\Preview;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function show($content_id)
    {
        // Fetch previews based on content_id
        $previews = Preview::where('content_id', $content_id)->get();

        // Return the previews as a JSON response
        return response()->json($previews);
    }
}
