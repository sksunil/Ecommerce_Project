<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function Orders($type = '')
    {
        if ($type == 'pending') {
            $orders = Order::where('deliverd', '0')->get();
        } elseif ($type == 'deliverd') {
            $orders = Order::where('deliverd', '1')->get();
        } else {
            $orders = Order::all();
        }


        return view('admin.orders', compact('orders'));

    }



    public function toggledeliver(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        //dd($order);
        if ($request->has('deliverd')) {
            // $time=Carbon::now()->addMinute(1);
            //$time = Carbon::now()->addMinute(1);

           // Mail::to('xyz@gmail.com')->later($time, new OrderShipped($order));
           // Mail::to('xyz@gmail.com')->send(new OrderShipped());

            $order->deliverd = $request->deliverd;
        } else {
            $order->deliverd = "0";
        }
        $order->save();

        return back();
    }
}

