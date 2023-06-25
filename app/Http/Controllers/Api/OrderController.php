<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

    }
    
    public function show($id)
    {
    }

    public function store(Request $request)
    {
        $items = $request->input('items');
        foreach ($items as $index => $item) {
            $order = new Order();
            $order->ad = $request->input('first_name');
            $order->soyad = $request->input('last_name');
            $order->email = $request->input('email');
            $order->telefon = $request->input('phone');
            $order->user_id = $request->input('user_id');
            $order->adet =  $request->input('adet'); 
            $order->durum =  "Pending";
            $order->product_id = $item;
            $order->valid_until = now()->addDay();
            $order->save();
        }
        return response()->json([
            'message' => "Siparişiniz Alınmıştır"
        ]);
    }
}
