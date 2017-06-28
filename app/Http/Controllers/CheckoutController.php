<?php

namespace App\Http\Controllers;
use Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
  /*  public function step1()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout.shipping');
        }

        return redirect('login');
    }*/



    public function shipping()
    {
        return view('front.shipping-info');
    }

    public function payment()
    {
        //return view('front.payment');
        return view('front.payment');
    }

    public function storePayment(Request $request)
    {


        \Stripe\Stripe::setApiKey("sk_test_wdqFM1PptvYeCNclXlKpfWoG");  //for API Key authentication


        $token = $request->stripeToken;


     try {
            $charge = \Stripe\Charge::create([
                "amount" => Cart::total()*100,  //AMount in cents
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ]);
            }
        catch (\Stripe\Error\Card $e) {
             //the cart has been declined
        }


        //create the order
        Order::createOrder();

       //redirect user to somee page
        return "Order Complited.....!!";


    }
}
