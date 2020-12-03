<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use App\Review;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mockery\Exception;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'can:mod-product']);
    }

    public function Editproductform($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        $user = Auth::user();

        return view('addeditproduct', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'product' => $product,
            'user' => $user,
            'mode' => 'Edit'
        ));
    }

    public function Editproduct(Request $request)
    {

        $request->validate([
            'productName' => 'required|max:50',
            'refNumber' => 'required|max:15',
            'brand' => 'required|max:30',
            'stock' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'category' => 'required|max:3'
        ]);

        $product = Product::findOrFail($request->input('productId'));

        $product->name = $request->input('productName');
        $product->refNumber = $request->input('refNumber');
        $product->brand = $request->input('brand');
        $product->description = $request->input('productDescription');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');

        //image
        if($request->hasFile('mainImage')){
            $path = $request->file('mainImage')->store('public/images');
            $product->mainImage = substr($path, 7);
        }

        if($request->input('discount') === "true"){
            $product->discount = $request->input('discountAmount');
        }else{
            $product->discount = 0;
        }

        $product->deliverableFrom = $request->input('expectedDelivery');
        $product->category_id = $request->input('category');

        $product->save();

        return redirect(route('viewProduct', ['id' => $request->input('productId')]));
    }

    public function Createproductform()
    {
        $categories = Category::all();
        $product = new Product;
        $user = Auth::user();

        return view('addeditproduct', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'product' => $product,
            'user' => $user,
            'mode' => 'Create'
        ));
    }

    public function Createproduct(Request $request)
    {
        $request->validate([
            'productName' => 'required|max:50',
            'refNumber' => 'required|max:15',
            'brand' => 'required|max:30',
            'stock' => 'required',
            'price' => 'required',
            'mainImage' => 'image|mimes:jpeg,png,jpg|max:2048',
            'discount' => 'required',
            'category' => 'required|max:3'
        ]);

        $product = new Product;

        $product->name = $request->input('productName');
        $product->refNumber = $request->input('refNumber');
        $product->brand = $request->input('brand');
        $product->description = $request->input('productDescription');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');

        //image
        if($request->hasFile('mainImage')){
            $path = $request->file('mainImage')->store('public/images');
            $product->mainImage = substr($path, 7);
        }

        if($request->input('discount') === "true"){
            $product->discount = $request->input('discountAmount');
        }else{
            $product->discount = 0;
        }

        $product->deliverableFrom = $request->input('expectedDelivery');
        $product->category_id = $request->input('category');

        $product->save();

        return redirect(route('viewProduct', ['id' => $product->id]));
    }

    public function Deleteproductform($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $user = Auth::user();

        return view('deleteproduct', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'product' => $product,
            'user' => $user
        ));
    }

    public function Deleteproduct(Request $request)
    {
        try{
            if (Gate::denies('mod-product')) {
                return redirect(route('home'));
            }

            $id = $request->input('productId');

            Review::where('product_id', $id)->delete();
            ProductImage::where('product_id', $id)->delete();
            Product::destroy($id);
            return redirect('/store/');
        }catch(QueryException $ex){
            return redirect(url()->previous())->withErrors(['Could not delete the item. It has probably been ordered']);
        }
    }

}
