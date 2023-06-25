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

    public function store(PreOrderRequest $request)
    {
        
        // Siparişteki ürünleri kaydet
        $items = $request->input('items');
        $quantity = $request->input('qty');
        
        foreach ($items as $index => $item) {
            $order = new Order();
            $order->ad = $request->input('first_name');
            $order->soyad = $request->input('last_name');
            $order->email = $request->input('email');
            $order->telefon = $request->input('phone');
            $user = auth()->user();
            $order->user_id = $user->id;
            $order->durum =  "Pending";
            $order->product_id = $item;
            $order->adet =  $quantity;
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
