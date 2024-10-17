<?php
namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function create()
{
    $books = Books::doesntHave('contents')->get();
    return view('admin.content.create',compact('books'));
}

  

    public function index(Request $request)
    {
        $contents = Content::latest()->get();
        return view('admin.content.index', compact('contents')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         // Validation rules
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,book_id',
        'description' => 'required',
    
      // Ensure the file is an image and required
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        // If validation fails, redirect back with errors and input data
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // If validation passes, proceed to store the book
    $content = new Content();
    $content->book_id = $request->input('book_id');
   
    $content->description = $request->input('description');
   

    // Handle file upload
 
    // Save the book
    $result = $content->save(); // Changed to save() instead of update()
            
    if ($result) {
        return redirect(route('admin.content.index'))->with('success', 'Content has been added successfully.');
    } else {
        return redirect(route('admin.content.index'))->with('error', 'Content has not been added.');
    }
   
    }

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
    { $content = Content::find($content_id);
        $books = Books::all(); // Assuming you have a book model
       
        return view('admin.content.edit', compact('content','books'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, $content_id)
    {
        $validator = Validator::make($request->all(), [
            
            'book_id' => 'required|exists:books,book_id',
            
            'description' => 'required',
           
             // Ensure the file is an image and req
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $content = Content::find($content_id); // Changed variable name to $book
            $content->book_id = $request->input('book_id');
          ;
            $content->description = $request->input('description');
   
            
          
            
            $result = $content->save(); // Changed to save() instead of update()
            
            if ($result) {
                return redirect(route('admin.content.index'))->with('success', 'Content has been updated successfully.');
            } else {
                return redirect(route('admin.content.index'))->with('error', 'Content has not been updated.');
            }
        }
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($content_id)
    {
        $content = Content::find($content_id);
    
        if ($content) {
         
            $previews = $content->previews;
            foreach ($previews as $preview) {
                $path = $preview->path;
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
                $preview->delete();
            }
    
          
            $result = $content->delete();
    
            if ($result) {
                return redirect(route('admin.content.index'))->with('success', 'Content and all associated previews have been deleted successfully.');
            } else {
                return redirect(route('admin.content.index'))->with('error', 'Content deletion failed.');
            }
        } else {
            return redirect(route('admin.content.index'))->with('error', 'Content not found.');
        }
    }
    
}
