<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Content;

class BookController extends Controller
{
    public function getBooksByCategory(Request $request)
    {
        $categoryId = $request->query('category_id');

        if (!$categoryId) {
            return response()->json(['error' => 'Category ID is required'], 400);
        }

        $books = Books::where('category_id', $categoryId)->get();

        return response()->json($books);
    }

    public function getBookContent(Request $request, $book_id)
{
    $content = Content::where('book_id', $book_id)->first();

    if (!$content) {
        return response()->json(['error' => 'No content found for the given book ID'], 404);
    }

    return response()->json($content);
}

}
