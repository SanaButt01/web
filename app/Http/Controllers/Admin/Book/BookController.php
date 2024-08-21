<?php
namespace App\Http\Controllers\Admin\Book;

use App\Models\Books;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    
 
    // public function index()
    // {
    //     // return response()->json($request->toArray());
        
    //     $books = Books::latest()->get();
    //     return view('admin.book.index', compact('books'));
    // }
    // In your controller

// In your controller
public function create()
{
    //
$categories = Category::all();
return view('admin.book.create', compact('categories'));
}
public function index(Request $request)
{$admin = auth()->user(); // Assuming the authenticated user is the admin
    $categories = Category::all();
    $category_id = $request->input('category_id');

    if ($category_id) {
        $books = Books::with('category')->where('category_id', $category_id)->get();
    } else {
        $books = Books::with('category')->get();
    }

    return view('admin.book.index', compact('books', 'categories', 'category_id','admin'));
}

public function store(Request $request)
{
    // Validation rules
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,category_id',
        'title' => 'required',
        'author' => 'required',
        'price' => 'required',
        // Ensure the file is an image and required
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        // If validation fails, redirect back with errors and input data
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // If validation passes, proceed to store the book
    $book = new Books();
    $book->category_id = $request->input('category_id');
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->price = $request->input('price');
    // Handle file upload
    if ($request->hasFile('path')) {
        $path = 'images/book';
        $icon = $request->file('path');
        $my_icon = rand() . '.' . $icon->getClientOriginalExtension();
        $upload = $icon->storeAs($path, $my_icon, 'public');
        $book->path = $path . '/' . $my_icon;
    }
$book->disc=$request->input('disc');
    // Save the book
    $book->save();

    // Redirect with success message
    return redirect(route('admin.book.index'))->with('success', 'Book has been added successfully.');
}



    public function show(Books $book)
    {
        //
    }


   
    public function edit($book_id)
{
    $book = Books::find($book_id);
    $categories = Category::all(); // Assuming you have a Category model

    return view('admin.book.edit', compact('book', 'categories'));
}
public function update(Request $request, $book_id)
{
    $validator = Validator::make($request->all(), [
        'category_id' => 'required|exists:categories,category_id',
        'title' => 'required',
        'author' => 'required',
        'path' => 'image|required',
        'price' => 'required',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    } else {
        $book = Books::find($book_id); // Changed variable name to $book
        $book->category_id = $request->input('category_id');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->price = $request->input('price');
        if ($request->hasfile('path')) {
            $path = '/' . $book->path;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = 'images/book';
            $icon = $request->file('path');
 
            $my_icon = rand() . '.' . $icon->getClientOriginalExtension();
            $upload = $icon->storeAs($path, $my_icon, 'public');
            $book->path = $path . '/' . $my_icon;
        }
        $book->disc=$request->input('disc');
        
        // Save the changes to the database
        $book->save();
        
        // Redirect with success message
        return redirect(route('admin.book.index'))->with('success', 'Book has been updated successfully.');
    }
}

    public function destroy($book_id)
    {
        $books = Books::find($book_id);
      

        $result = $books->delete();
        if ($result) {
            return redirect(route('admin.book.index'))->with('success', 'Data has been deleted successfully.');
        } else {

            return redirect(route('admin.book.index'))->with('error', 'Data has not been deleted');
        }
    }
}
