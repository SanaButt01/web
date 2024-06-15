<?php

namespace App\Http\Controllers\Admin\Preview;


use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Preview;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
{
    $previews = Preview::all()->groupBy('content_id');
    return view('admin.preview.index', compact('previews'));
}
    public function create($contentId)
    {
        $content = Content::findOrFail($contentId);
        return view('admin.preview.create', compact('content'));
    }

  
    public function store(Request $request, $contentId)
{
    $request->validate([
        'images' => 'required|array|min:2|max:3',
        'images.*' => 'required|image|mimes:jpeg,png,jpg|',
    ]);

    foreach ($request->file('images') as $image) {
        $path = $image->store('previews', 'public');

        Preview::create([
            'content_id' => $contentId,
            'path' => $path,
        ]);
    }

    return redirect()->route('previews.index')->with('success', 'Previews uploaded successfully');
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($content_id)
    {
        $previews = Preview::where('content_id', $content_id)->get();
        return view('admin.preview.edit', compact('content_id', 'previews'));
    }
    
    public function update(Request $request, $content_id)
    {
        $request->validate([
            'images' => 'required|array|min:1|max:3',
            'images.*' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        // Delete existing images
        $existingPreviews = Preview::where('content_id', $content_id)->get();
        foreach ($existingPreviews as $preview) {
            Storage::disk('public')->delete($preview->path);
            $preview->delete();
        }
    
        // Upload new images
        foreach ($request->file('images') as $image) {
            $path = $image->store('previews', 'public');
            Preview::create([
                'content_id' => $content_id,
                'path' => $path,
            ]);
        }
    
        return redirect()->route('previews.index')->with('success', 'Previews updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
