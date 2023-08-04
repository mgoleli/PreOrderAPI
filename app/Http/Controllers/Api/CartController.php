<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index($id){
        $carts = Cart::where('user_id', $id)->with('product')->get();
        return response()->json([
            'data' => $carts
        ]);
    }

    public function store(Request $request){
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $user_id = $request->input('user_id');

        $cartItem = new Cart();
        $cartItem->product_id = $product_id;
        $cartItem->quantity = $quantity;
        $cartItem->user_id = $user_id; 
        $cartItem->save();
    
        return response()->json([
            'message' => 'Ürün sepete eklendi',
        ]);
    }

    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $user_id = $request->input('user_id');

        $cart = Cart::findOrFail($id);
        $cart->quantity = $quantity;
        $cart->user_id = $user_id;
        $cart->save();

        return response()->json(['success' => 'Sepetinizdeki Ürün Güncellendi']);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return response()->json([
            'message' => "Sepetenizdeki Ürün Başarıyla Silindi"
        ]);
    }
}
