<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(Request $request)
    {
        $query = Category::query();
    
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('category_name', 'LIKE', "%{$search}%"); 
        }
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}


public function create()
{
    return view('categories.create'); 
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|string|max:255|min:3', 
    ]);

    $category = Category::create($validatedData); 

    return redirect()->route('categories.index')->with('success', 'Category created successfully!'); 
}


    /**
     * Display the specified resource.
     */
public function show($id)
{
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{

    $category = Category::findOrFail($id); 

    return view('categories.edit', compact('category'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([ 
        'category_name' => 'required|string|max:255|unique:categories,category_name,'.$id 
    ]);

    $category = Category::findOrFail($id);

    $category->update($validatedData); 

    return redirect()->route('categories.index')->with('success', 'Category updated successfully!'); 
}

    /**
     * Remove the specified resource from storage.
     */

public function destroy($id)
{
    try {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!'); 
    } catch (\Exception $e) {
        return redirect()->route('categories.index')->with('error', 'Unable to delete category.');
    }
    }
}
