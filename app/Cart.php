<?php


namespace App;

//This is not an Eloquent class but a regular OO class (to be kept in the session).
class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addProduct($product, $id)
    {
        if($product->discount == null || $product->discount == 0){
            $useprice = $product->price;
        }
        else{
            $useprice = $product->price - (($product->price/100) * $product->discount);
        }

        $storedProduct = ['qty' => 0, 'price' => $useprice, 'product' => $product];
        if($this->products) {
            if(array_key_exists($id, $this->products)){
                $storedProduct = $this->products[$id];
            }
        }
        $storedProduct['qty']++;
        $storedProduct['price'] = $useprice * $storedProduct['qty'];
        $this->products[$id] = $storedProduct;
        $this->totalQty++;
        $this->totalPrice += $useprice;
    }

    public function removeProduct($product, $id)
    {
        if($this->products[$id]['product']->discount == null || $this->products[$id]['product']->discount == 0){
            $useprice = $this->products[$id]['product']->price;
        }
        else{
            $useprice = $this->products[$id]['product']->price - (($this->products[$id]['product']->price/100) * $this->products[$id]['product']->discount);
        }

        if(array_key_exists($id, $this->products)){
            if($this->products[$id]['qty'] > 1){
                $this->products[$id]['qty']--;
                $this->products[$id]['price'] = $this->products[$id]['price'] - $useprice;
                $this->totalQty--;
                $this->totalPrice -= $useprice;
            }else{
                unset($this->products[$id]);
                $this->totalQty--;
                $this->totalPrice -= $useprice;
            }
        }
    }
}
