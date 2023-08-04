<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PreOrderRequest;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->with('product')->get();
        return view('carts', compact('carts'));
    }

    public function show($id)
    {
    }

    public function store(PreOrderRequest $request)  //çoklu ürün gönderme siparişte sorun var - düzenle
    {
        $items = $request->input('items');
        $quantities = $request->input('quantity');
        
        // dd($request);die();
        foreach ($items as $item) {
            $order = new Order();
            $order->name = $request->input('first_name');
            $order->surname = $request->input('last_name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $user = auth()->user();
            $order->user_id = $user->id;
            $order->status =  "Pending";
            $order->product_id = $item['productId']; // Sepetteki ürünün ID'si
            $order->quantity =  $item['quantity']; // Sepetteki ürünün miktarı
            $order->valid_until = now()->addDay();
            $order->save();
        }

        return redirect()->route('orders')->with('success', 'Siparişiniz başarıyla alındı!');
    }

    public function update(Request $request, $id)
    {
        $quantities = $request->input('qty');
        foreach ($quantities as $cartId => $quantity) {
            $cartItem = Cart::findOrFail($cartId);
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        return redirect()->back()->with('success', 'Sepetiniz Güncellendi');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->back()->with('success', 'Sepetten kaldırıldı');
    }
}
