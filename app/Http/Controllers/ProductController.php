<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products')); 
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
        
        $user = auth()->user();
        if(auth()->user()){
            // Yeni bir ürün oluşturma işlemi
            $product_id = $request->input('product_id');
            $quantity = $request->input('quantity');
            $cart = new Cart();
            $cart->product_id = $product_id;
            $cart->user_id = $user->id;

        }else{
            return redirect()->route('products')->with('error', "Ürünü Sepetinize Ekleyebilmeniz İçin Giriş Yapmanız Gerekmektedir!");
        }
        $cart->quantity = $quantity;
        $cart->save();

        return redirect()->route('products')->with('success', "Ürün Sepetinize Eklendi");
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
