<?php

namespace App\Http\Controllers;

use App\Category;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Session;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function PlaceOrder(Request $request){

        $request->validate([
            'termsandconditions' => 'required',
        ]);

        $cart = Session::get('cart');
        $user = Auth::user();

        if($request->input('differentAddress')){
            $billingAddress = $user->getAddress('billing')->first();
            $shippingAddress = $user->getAddress('shipping')->first();
        }else{
            $both = $user->getAddress('both')->first();
            if(!$both){
                return redirect(url()->previous())->withErrors(['No address for billing and shipping on record. Please remove shipping address to bill and ship to the same address']);
            }
            $billingAddress = $both;
            $shippingAddress = $both;
        }
        $order = new Order();

        $order->billing_address = $billingAddress->id;
        $order->delivery_address = $shippingAddress->id;
        $order->totalPrice = $cart->totalPrice;

        $order->paid = true; //Add payment code or set to false if paying later is an option
        $order->delivered = false; //Add shipping verification code. Set to true when order arrives

        $order->notes = $request->input('notes');

        $user->Orders()->save($order);

        foreach ($cart->products as $product) {
            $orderDetail = new OrderDetail();

            $orderDetail->product_id = $product['product']->id;
            $orderDetail->subtotal = $product['price'];
            $orderDetail->amount = $product['qty'];

            $order->OrderDetails()->save($orderDetail);
        }

        $request->session()->forget('cart');
        return redirect(route('viewOrders'));
    }

    public function ViewOrders(){

        $categories = Category::all();
        $user = Auth::user();
        $orders = $user->Orders;

        return view('ordersview', array(
            'categories' => $categories,
            'user' => $user,
            'orders' => $orders
        ));
    }
}
