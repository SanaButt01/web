<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Models\Content;
use App\Models\Books;
use App\Models\Preview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|unique:categories,type',
            'icon' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $category = new Category;
            $category->type = $request->input('type');

            if ($request->hasFile('icon')) {
                $path = 'images/category';
                $icon = $request->file('icon');
                $iconName = rand() . '.' . $icon->getClientOriginalExtension();
                $icon->storeAs($path, $iconName, 'public');
                $category->icon = $path . '/' . $iconName;
            }

            $category->save();

            return redirect()->route('category.index')->with('status', 'Data has been inserted successfully.');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'icon' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $category = Category::find($id);
            $category->type = $request->input('type');

            if ($request->hasFile('icon')) {
                $oldIconPath = '/' . $category->icon;
                if (Storage::disk('public')->exists($oldIconPath)) {
                    Storage::disk('public')->delete($oldIconPath);
                }

                $path = 'images/category';
                $icon = $request->file('icon');
                $iconName = rand() . '.' . $icon->getClientOriginalExtension();
                $icon->storeAs($path, $iconName, 'public');
                $category->icon = $path . '/' . $iconName;
            }

            $category->save();

            return redirect()->route('category.index')->with('status', 'Data has been updated successfully.');
        }
    }
    public function destroy($category_id)
    {
        $category = Category::find($category_id);
    
        if ($category) {
           
            $books = $category->books;
            foreach ($books as $book) {
                // Delete any associated content and previews
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
                $book->delete();
            }
    
            // Delete the category
            $result = $category->delete();
    
            if ($result) {
                return redirect(route('category.index'))->with('success', 'Category and all associated books have been deleted successfully.');
            } else {
                return redirect(route('category.index'))->with('error', 'Category deletion failed.');
            }
        } else {
            return redirect(route('category.index'))->with('error', 'Category not found.');
        }
    }
    }
