<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Auth;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function ViewCart()
    {
        $categories = Category::all();
        $user = Auth::user();

        $cart = null;

        if(Session::has('cart')) {
            if (count(Session::get('cart')->products) > 0) {
                $cart = Session::get('cart');
            }
        }

        return view('cartview', array(
            'categories' => $categories,
            'user' => $user,
            'cart' => $cart
        ));
    }

    public function addToCart(Request $request, $id, $amount)
    {
        if($request->input('amount')){
            $amount = $request->input('amount');
        }

        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        for($i = 0; $i < $amount; $i++){
            $cart->addProduct($product, $product->id);
        }

        Session::put('cart', $cart);
        $request->session()->flash('CartMessage', $product->name .' Was added to the cart!');
        return redirect()->back();
    }

    public function removeFromCart($id, $amount)
    {
        $product = Product::findOrFail($id);

        for($i = 0; $i < $amount; $i++){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeProduct($product, $product->id);
            Session::put('cart', $cart);
        }

        Session::flash('CartMessage', $product->name .' Was removed from the cart!');
        return redirect()->back();
    }
}
