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
    
        $cartItems = $user->UserProducts()->get();    
        $total = $cartItems->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
    
        return view('website.Carts.index', compact('cartItems', 'total'));
    }



public function store(Request $request, $productId)
    {
        Product::findOrFail($productId);
    
        /** @var \App\Models\User $user*/
        $user = Auth::user();
    
        $existProduct = $user->UserProducts()->where('product_id', $productId)->first();
    
        if ($existProduct) {
            $newQuantity = $existProduct->pivot->quantity + ($request->quantity ?? 1);
            $user->UserProducts()->updateExistingPivot($productId, [
                'quantity' => $newQuantity
            ]);
        } else {
            $user->UserProducts()->attach($productId, [
                'quantity' => $request->quantity ?? 1
            ]);
        }
    
        return redirect()->back()->with('success', 'The product has been successfully added to the cart');
    }



    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->UserProducts()->updateExistingPivot($productId, [
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'تم تحديث الكمية.');
    }



    public function destroy($productId)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->UserProducts()->detach($productId);

        return redirect()->back()->with('success' , 'Product Deleted Successfully');
    }



    public function clear()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->UserProducts()->detach();

        return redirect()->back()->with('success', 'تم إفراغ السلة.');
    }








}
