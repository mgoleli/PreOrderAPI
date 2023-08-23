<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendSmsJob;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
    }

    public function show($id)
    {
    }

    public function validePhoneNumber($phoneNumber){

        $phoneNumber = preg_match('/^\+(90|1|44)/', $phoneNumber);

        if($phoneNumber)
            return true;
        else
            return false;    
    }

    public function store(Request $request)
    {
        $items = $request->input('items');
        foreach ($items as $index => $item) {
            $order = new Order();  //stdClass kullanılabilir (dönüştürme gerekli)
            if(!self::validePhoneNumber($request->input('phone'))){
                return response()->json([
                    'success'  => false,
                    'message'  => 'Telefon numarası ülke kodu içermelidir!'
                ]);
            }
            $order->name = $request->input('first_name');
            $order->surname = $request->input('last_name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->user_id = $request->input('user_id');
            $order->quantity =  $request->input('quantity');
            $order->status =  "Pending";
            $order->product_id = $item;
            $order->valid_until = now()->addDay();
            $result = $order->save();
        }

        if ($result) {
            $message = $order->id . " nolu siparişiniz alınmıştır. Bizi tercih ettiğiniz için teşekkür ederiz.";

            //işi kuyruğa ekle
            SendSmsJob::dispatch($order->phone, $message);

            //hemen yanıt dön
            return response()->json([
                'success'  => true,
                'message'  => 'Siparişiniz Alınmıştır'
            ]);
        }
    }
}
