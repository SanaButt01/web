<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\Books;

class AdminController extends Controller{
public function show()
{
    return view('home');
}
public function book()
{
    return view('books');
}
public function store(Request $request)
{
     $request->validate([
     'title' => 'required',
        'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'author' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
       
     ]);
    // $book = new Books;
    // $book->title= $request['title'];
    // $book->author= $request['author'];
    // $book->path= $request['path'];
    // $book->description= $request['description'];
    // $book->price= $request['price'];
    $image = $request->file('path');
    $imageName = time().'.'.$image->extension();
    $image->move(public_path('images'), $imageName);

    // Save image path or binary data to the database and get the created record
    $book = Books::create([
        'title' => $request['title'],
        'path' => 'images/'.$imageName,
        'author' => $request['author'],
        'description' => $request['description'],
        'price' => $request['price'],
    ]);
    // dd('Reached after validation');
// $book->save();
  
// return redirect('/Register');
}

public function view()
{
    $customers=Customer::all();
    $data=compact("customers");
return view("Dashboard")->with($data);
}
public function viewbooks()
{
    $books=Books::all();
    $data=compact("books");
return view("books")->with($data);
}
public function addbooks()
{
    $url= url('/image/upload');
    $title="Add Books";
    $data=compact('url','title');
    return view('form')->with($data);
}
public function deletebooks($id)
{
    $books = Books::find($id);
    if(!is_null($books))
    {
        $books->delete();
    }
   return redirect('/Register/view');
}
public function editbooks($id)
{
    $books = Books::find($id);
    if(!is_null($books))
    {
        $url= url('/books/update') . "/" . $id;
        $title="Update Books";
     
        return view('form',compact('books','title','url'));

    }
    return redirect('/Register/view');
}
public function updatebooks($id, Request $request)
{
    $books = Books::find($id);
   
    $books->title = $request['title'];
    $books->author = $request['author'];
    if ($request->hasFile('path')) {
        // Delete the old picture (optional, depending on your requirements)
        if ($books->path) {
            Storage::delete($books->path);
        }

        // Store the new picture
        $path = $request->file('path')->store('images', 'public');
        $books->path = $path;
    }
    $books->description = $request['description'];
    $books->price = $request['price'];
    //dd('chl gya');
    $books->save();
  return redirect('/image/gallery');
}
}