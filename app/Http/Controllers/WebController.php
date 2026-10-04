<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function home() 
    {
        return view('website.home.index');
    }


    public function men()
    {
        $menCategory = Category::where('department', 'men')->first();
    
        $men = Product::where('category_id', $menCategory->id)
            ->orderBy('id', 'asc')->paginate(15);
    
        return view('website.products.men', compact('men'));
    }


    public function woman() 
    {
        $womanCategory = Category::where('department' , 'woman')->first();
    
        $women = Product::where('category_id' , $womanCategory->id)
            ->orderBy('id' , 'asc')->paginate(15);
    
        return view('website.products.woman' , compact('women'));
    }


    public function children() 
    {
        $childCategory = Category::where('department' , 'children')->first();
    
        $children = Product::where('category_id' , $childCategory->id)
            ->orderBy('id' , 'asc')->paginate(15);
    
        return view('website.products.children' , compact('children'));
    }


    public function accessories() 
    {
        $accessoriesCategory = Category::where('department' , 'accessories')->first();
    
        $accessories = Product::where('category_id' , $accessoriesCategory->id)
            ->orderBy('id' , 'asc')->paginate(15);
    
        return view('website.products.accessories' , compact('accessories'));
    }










}
