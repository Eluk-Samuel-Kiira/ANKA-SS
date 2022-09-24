<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function index(){
        return view('cart');
    }
    function addToCart(Request $req) 
    {
        $cart = new Cart();
        $cart->user_id = $req->user_id;
        $cart->product_id = $req->product_id;
        $cart->quantity = 1;
        $cart->save();
        return redirect('/user/dashboard');
    }

    function fromCart()
    {
        if(Cart::where('user_id', 8)){
            $cartlists = Cart::join('products','products.id','=','carts.product_id')->where('carts.status',1)->get();

            return view('welcome', compact('cartlists'));

        }
    }
}
