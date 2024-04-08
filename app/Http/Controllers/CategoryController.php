<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ... (Inside your CategoryController) ...

public function index()
{
    $categories = Category::all(); // Fetch all categories
    return view('categories.index', compact('categories')); // Pass them to a view
}


public function create()
{
    return view('categories.create'); 
}


public function store(Request $request)
{
    // 1. Validate the input
    $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|string|max:255|min:3', 
    ]);

    // 2. Create a new category
    $category = Category::create($validatedData); 

    // 3. Redirect with success message (or to a relevant view) 
    return redirect()->route('categories.index')->with('success', 'Category created successfully!'); 
}


    /**
     * Display the specified resource.
     */
public function show($id)
{
    // 1. Retrieve the category
    $category = Category::findOrFail($id);

    // 2. Pass the category to the view
    return view('categories.show', compact('category'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // 1. Find the category 
    $category = Category::findOrFail($id); // Retrieve the category or fail 

    // 2. Pass the category to the view
    return view('categories.edit', compact('category'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // 1. Validate the input (with adjustments) 
    $validatedData = $request->validate([ 
        'category_name' => 'required|string|max:255|unique:categories,category_name,'.$id 
    ]);

    // 2. Find the category 
    $category = Category::findOrFail($id);

    // 3. Update category information
    $category->update($validatedData); 

    // 4. Redirect with success message
    return redirect()->route('categories.index')->with('success', 'Category updated successfully!'); 
}

    /**
     * Remove the specified resource from storage.
     */
    // ... inside CategoryController ... 

public function destroy($id)
{
    try {
        // Attempt to find and delete the category
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!'); 

    } catch (\Exception $e) {
        // Handle the error appropriately
        return redirect()->route('categories.index')->with('error', 'Unable to delete category.');
    }
    }
}
