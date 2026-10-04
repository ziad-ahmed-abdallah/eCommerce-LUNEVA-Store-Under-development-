<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()   // go to index view
    {
        $products = Product::with('category')->orderBy('category_id' , 'asc')->paginate(15);
        return view('backend.products.index' , compact('products'));
    }


    public function doSearch(Request $request)
    {
        $products = Product::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('department', 'LIKE' , '%' . $request->search . '%');
            })->paginate(15);
    
        return view('backend.products.index', compact('products'));
    }


    public function create()  // go to create page
    {
        $categories = Category::orderBy('id' , 'asc')->get();
        return view('backend.products.create' , compact('categories'));
    }

    public function store(ProductRequest $request) 
    {
        $data = $request->validated(); // requests after validate
    
        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
    
        Product::create($data); 
    
        return redirect()->back()->with('success' , ' Product has Created Successfully');
    }



    public function edit (int $id)   // go to edite page
    {
        $categories = Category::orderBy('id' , 'asc')->get();
        $product = Product::findOrFail($id);
        return view('backend.products.edit' , compact('product' , 'categories'));
    }

public function update(Request $request , int $id)  // do the update
{
    // validation:-
    $request->validate([
        'name'        => 'required|max:70',
        'price'       => 'required|numeric',
        'image'       => 'nullable|image',
        'size'        =>'required',
        'category_id' => 'required'
    ]);

    $product = Product::findOrFail($id);

    $imagePath = $product->image;
    if($request->hasFile('image')) {
        // delete old image
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
    
        // upload new image
        $imagePath = $request->file('image')->store('images', 'public');
    }

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imagePath,
        'size' => $request->size,
        'category_id' => $request->category_id
    ]);

    return redirect()->route('admin.products.index')->with('success' , 'Product has Updated Successfully');
}


    public function delete(int $id)  // soft delete
    {
        Product::findOrFail($id)->delete();
    
        return redirect()->route('admin.products.index')->with('success' , 'Product has deleted Successfully');
    }



// Pin part
public function archive() // go to archive view
{
    $products = Product::onlyTrashed()->get();
    return view('backend.products.archive' , compact('products'));
}

    public function forceDelete(int $id)   // do final delete
    {
        Product::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.products.archive')->with('success' , 'Deleted Successfully');
    }

    public function restore(int $id) 
    {
        Product::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.products.archive')->with('success' , 'Restored Successfully');
    }


}
