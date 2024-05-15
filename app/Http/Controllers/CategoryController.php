<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function list()
    {
        return view('categories.list', ['categories' => Category::simplePaginate(10)]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        if (!auth()->check()) {
            abort(403, 'Unauthorized Action!');
        }

        $formField = $request->validate([
            'name' => 'required|string'
        ]);

        Category::create($formField);

        return redirect('/categories')->with('message', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {

        if (!auth()->check()) {
            abort(403, 'Unautorized!');
        }

        $formField = $request->validate([
            'name' => 'required|string'
        ]);

        $category->update($formField);

        return back()->with('message', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {

        if (!auth()->check()) {
            abort(403, 'Unauthorized!');
        }

        $category->delete();

        return back()->with('message', 'Post deleted successfully!');
    }
}
