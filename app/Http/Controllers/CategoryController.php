<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() // go to index page and desplay all Categories
    {
        $categories = Category::orderBy('id' , 'asc')->get();
        return view('backend.categories.index' , compact('categories'));
    }



    public function create()  // show create
    {
        return view('backend.categories.create');
    }
public function store(Request $request) 
{
    // using create function (static method)
    $request->validate([  
        'department' => 'required|unique:categories,department|max:255',
    ], 
    [
        'department.required' => ' Write The Name',
        'department.unique' => ' Category already Exists ',
    ]);

    Category::create([ 
        'department' => $request->department 
    ]);

    return redirect()->back()->with("success", " Category Added Successfully ");
}


    public function edit(int $id)  // go to the page
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }
    public function update(int $id , Request $request)
    {
        $caterory = Category::findOrFail($id);
    
        $caterory->update([
            'department' =>$request->department
        ]);
    
        return redirect()->route('categories.index')->with("success", "Updated Successfully");
    }


    public function delete(int $id)   // delete category
    {
        Category::findOrFail($id)->delete();

        return redirect()->back()->with("deleted Successfully");
    }



























}



