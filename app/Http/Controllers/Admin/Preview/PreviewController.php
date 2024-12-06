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
    $content = Content::find($content_id);

    if (!$content) {
        return redirect()->route('previews.index')->with('error', 'Content not found');
    }

    $previews = Preview::where('content_id', $content_id)->get();
    return view('admin.preview.edit', compact('content', 'content_id', 'previews'));
}
     public function update(Request $request, $content_id)
     {
         $request->validate([
             'images' => 'required|array|min:1|max:3',
             'images.*' => 'required|image|mimes:jpeg,png,jpg',
         ]);
 
         $existingPreviews = Preview::where('content_id', $content_id)->get();
         foreach ($existingPreviews as $preview) {
             Storage::disk('public')->delete($preview->path);
             $preview->delete();
         }
 
         foreach ($request->file('images') as $image) {
             $path = $image->store('previews', 'public');
             Preview::create([
                 'content_id' => $content_id,
                 'path' => $path,
             ]);
         }
 
         return redirect()->route('previews.index')->with('success', 'Previews updated successfully');
     }
     public function destroy($content_id)
     {
         // Retrieve the content
         $content = Content::findOrFail($content_id);
     
         
         $previews = Preview::where('content_id', $content_id)->get();
     
         
         foreach ($previews as $preview) {
             $path = $preview->path;
             if (Storage::disk('public')->exists($path)) {
                 Storage::disk('public')->delete($path);
             }
             $preview->delete();
         }
     
        
        
         return redirect()->route('previews.index')->with('success', 'Associated previews deleted successfully');
     }

    public function editImage(Request $request)
    {
        $image = Preview::where('preview_id', $request->preview_id)->firstOrFail();
        return response()->json(['code' => 1, 'result' => $image]);
    }
  
public function updateImage(Request $request, $content_id, $preview_id)
{
    
    $request->validate([
        'image_update' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    
    $preview = Preview::where('content_id', $content_id)
                      ->where('preview_id', $preview_id)
                      ->first();

    if ($preview) {
        
        Storage::disk('public')->delete($preview->path);

        
        $path = $request->file('image_update')->store('previews', 'public');

       
        $preview->path = $path;
        $preview->save();

        return response()->json(['code' => 1, 'message' => 'Image updated successfully']);
    }

    return response()->json(['code' => 0, 'message' => 'Image not found']);
}

    public function deleteImage(Request $request, $content_id, $preview_id)
    {
        $preview = Preview::where('content_id', $content_id)->where('preview_id', $preview_id)->first();
    
        if ($preview) {
            Storage::disk('public')->delete($preview->path);
            $preview->delete();
            return response()->json(['code' => 1, 'message' => 'Image deleted successfully']);
        }
    
        return response()->json(['code' => 0, 'message' => 'Image not found']);
    }
}
   



