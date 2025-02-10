<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function home() {
        return view('frontend.home');
    }

    public function about() {
        return view('frontend.about');
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function blogs() {
        return view('frontend.blogs');
    }
    public function shop() {
        return view('frontend.shop');
    }
    public function wish() {
        return view('frontend.wish');
    }
    public function order() {
        return view('frontend.order');
    }
    public function profile() {
        return view('frontend.profile');
    }
    //cart controller start
        public function cart()
        {
            return view('frontend.cart');
        }
        public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $cart[$request->id] = [
            "name" => $request->name,
            "type" => $request->type,
            "price" => $request->price
        ];
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Component added to cart.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Component removed.');
    }
    //cart controller end
}


