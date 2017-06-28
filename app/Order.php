<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable=['total','deliverd'];

  public function orderItems()
  {
      return $this->belongsToMany(Product::class)->withPivot('qty','total');
  }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
  public static function createOrder()
  {

      $user=Auth::user();
      $order=$user->orders()->create([

          'total'=>Cart::total(),
          'deliverd'=>0

      ]);



      $cartItems=Cart::content();
      foreach ($cartItems as $cartItem)
      {
          $order->orderItems()->attach($cartItem->id,[
              'qty'=>$cartItem->qty,
              'total'=>$cartItem->qty*$cartItem->price
          ]);
      }
  }
}
