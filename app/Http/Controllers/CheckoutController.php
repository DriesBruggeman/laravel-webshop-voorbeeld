<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

use Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','checkCart']);
    }

    public function Checkout()
    {
        $cart = null;

        $cart = Session::get('cart');

        $categories = Category::all();
        $user = Auth::user();

        $address = $user->getAddress('both')->first();

        if(!$address){
            $address = $user->getAddress('billing')->first();
            if(!$address){
                $address = false;
            }
        }

        $shippingAddress = $user->getAddress('shipping')->first();

        if(!$shippingAddress){
            $shippingAddress = false;
        }

        //dd($address);
        return view('checkout', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'user' => $user,
            'cart' => $cart,
            'address' => $address,
            'shippingAddress' => $shippingAddress
        ));
    }
}
