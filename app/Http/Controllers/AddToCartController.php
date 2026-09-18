<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{

public function index()
    {
        /** @var \App\Models\User $user */  
        $user = Auth::user();
    
        $cartItems = $user->UserProducts()->with('category')->get();
    
        $total = $cartItems->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
    
        return view('website.Carts.index', compact('cartItems', 'total'));
    }










}
