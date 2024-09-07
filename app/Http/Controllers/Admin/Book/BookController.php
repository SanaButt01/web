<?php

namespace App\Http\Controllers\Admin\Book;

use App\Models\Books;
use App\Models\Category;
use App\Models\Content;
use App\Models\Preview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $admin = auth()->user(); // Assuming the authenticated user is the admin
        $categories = Category::all();
        $category_id = $request->input('category_id');

        if ($category_id) {
            $books = Books::with('category')->where('category_id', $category_id)->get();
        } else {
            $books = Books::with('category')->get();
        }

        return view('admin.book.index', compact('books', 'categories', 'category_id', 'admin'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,category_id',
            'title' => 'required|unique:books,title',
            'author' => 'required',
            'price' => 'required',
            'path' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = new Books();
        $book->category_id = $request->input('category_id');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->price = $request->input('price');

        if ($request->hasFile('path')) {
            $path = 'images/book';
            $icon = $request->file('path');
            $iconName = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->storeAs($path, $iconName, 'public');
            $book->path = $path . '/' . $iconName;
        }

        $book->disc = $request->input('disc');
        $book->save();

        return redirect()->route('admin.book.index')->with('status', 'Book has been added successfully.');
    }

    public function edit($book_id)
    {
        $book = Books::find($book_id);
        $categories = Category::all();
        return view('admin.book.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $book_id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,category_id',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'path' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = Books::find($book_id);
        $book->category_id = $request->input('category_id');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->price = $request->input('price');

        if ($request->hasFile('path')) {
            $oldPath = $book->path;
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            $path = 'images/book';
            $icon = $request->file('path');
            $iconName = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->storeAs($path, $iconName, 'public');
            $book->path = $path . '/' . $iconName;
        }

        $book->disc = $request->input('disc');
        $book->save();

        return redirect()->route('admin.book.index')->with('status', 'Book has been updated successfully.');
    }

    public function destroy($book_id)
    {
        $book = Books::find($book_id);
        
        if ($book) {
            // Delete all associated previews through content
            $contents = $book->contents;
            foreach ($contents as $content) {
                $previews = $content->previews;
                foreach ($previews as $preview) {
                    if (Storage::disk('public')->exists($preview->path)) {
                        Storage::disk('public')->delete($preview->path);
                    }
                    $preview->delete();
                }
                $content->delete();
            }
    
            // Now delete the book
            $result = $book->delete();
    
            if ($result) {
                return redirect(route('admin.book.index'))->with('success', 'Book and all associated data have been deleted successfully.');
            } else {
                return redirect(route('admin.book.index'))->with('error', 'Book deletion failed.');
            }
        } else {
            return redirect(route('admin.book.index'))->with('error', 'Book not found.');
        }
    }
    
}
