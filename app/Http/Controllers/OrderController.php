<?php

namespace App\Http\Controllers;

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
        $user = Auth::user();
        if (auth()->check() && auth()->user()->role_id === 1) {
            $orders = Order::with('product')->where('durum', 'Pending')->get();
        }else{
            $orders = Order::with('product')->where('durum', 'Pending')->where('user_id', auth()->id())->get();
        }
        return view('orders', compact('orders'));
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
    }

    public function update($id)
    {
        $order = Order::findOrFail($id);
        $order->durum = 'approved';
        $order->save();

        $message = $order->id . " nolu siparişiniz onaylandı. Bizi tercih ettiğiniz için teşekkür ederiz!";
    

        // Twilio'yu kullanarak SMS gönderimi
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $twilio->messages->create(
            "+9".$order->telefon, // Sipariş sahibinin telefon numarası
            [
                'from' => env('TWILIO_NUMBER'),
                'body' => $message
            ]
        );
    
        return redirect()->route('orders')->with('success', 'Sipariş onaylandı.');
    }

    public function checkValidity()
    {
        $expiredOrders = Order::where('durum', 'Pending')->where('valid_until', '<', now())->get();

        foreach ($expiredOrders as $order) {
            $order->durum = "autoRejected";
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
