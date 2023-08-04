<?php

namespace App\Http\Controllers;

use App\Jobs\SendSmsJob;
use Illuminate\Http\Request;
use App\Models\Order;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (auth()->check() && auth()->user()->role_id === 1) {
            $orders = Order::with('product')->where('status', 'Pending')->get();
        }else{
            $orders = Order::with('product')->where('status', 'Pending')->where('user_id', auth()->id())->get();
        }
        return view('orders', compact('orders'));
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
    }

    public function update($id) //admin siparişi onayladıktan sonra
    {
        $order = Order::findOrFail($id);
        $order->status = 'approved';
        $order->save();

        $message = $order->id . " nolu siparişiniz onaylandı. Bizi tercih ettiğiniz için teşekkür ederiz!";

        //Api ve Web uygulaması için oluşturulmuş iş sınıfın ve kuyruğa eklenmesi
        SendSmsJob::dispatch($order->phone, $message);
    
        return redirect()->route('orders')->with('success', 'Siparişiniz onaylandı.');
    }

    public function checkValidity()
    {
        $expiredOrders = Order::where('status', 'Pending')->where('valid_until', '<', now())->get();

        foreach ($expiredOrders as $order) {
            $order->status = "autoRejected";
            $order->save();
        }
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', "Sipariş Silinmiştir");
    }
}
