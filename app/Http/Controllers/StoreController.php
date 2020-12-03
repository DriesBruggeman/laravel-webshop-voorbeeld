<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Review;
use App\User;
use http\Env\Response;
use Illuminate\Database\QueryException;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    private function GetBrands()
    {
        return  Product::distinct()->get(['brand']);
    }

    public function index()
    {
        $categories = Category::all();
        $newProducts = Product::all()->take(5); //Ik zou meer iets gebruiken in de zin de laatste week toegevoegd. Maar alle created_at zijn dezelfde door de seeder.
        $user = Auth::user();

        return view('home', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'newProducts' => $newProducts,
            'user' => $user
        ));
    }

    public function Storefront()
    {
        $categories = Category::all();
        $products = Product::all();
        $user = Auth::user();

        return view('store', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'products' => $products,
            'user' => $user,
            'brands' => $this->GetBrands()
        ));
    }

    public function FilterCategories($term)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $term)->get();
        $user = Auth::user();

        return view('store', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'products' => $products,
            'user' => $user,
            'brands' => $this->GetBrands()
        ));
    }

    public function Showproduct($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $user = Auth::user();

        return view('product', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'user' => $user,
            'mainProduct' => $product
        ));
    }

    public function LeaveReview(Request $request)
    {
        $request->validate([
            'product_id' => 'exists:products,id',
            'rating' => 'required|between:0,6',
            'review' => 'required|max:200',
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        $review = new Review();

        $review->rating = floor($request->input('rating'));
        $review->review = $request->input('review');
        $review->user_id = Auth::id();

        $product->reviews()->save($review);

        return redirect(route('viewProduct', ['id' => $request->input('product_id')]));
    }

    public function DeleteReview(Request $request)
    {
        try{
            $review = Review::findOrFail($request->input('review_id'));
            $review->delete();
            return redirect()->back();
        }catch(QueryException $ex){
            return redirect()->back()->withErrors(['Could not delete review']);
        }

    }

    public function DeleteOwnReview(Request $request)
    {
        try {
            $review = Review::findOrFail($request->input('review_id'));

            if (Auth::id() === $review->user_id) {
                $review->delete();
                return redirect()->back();
            } else {
                abort(403);
            }
        }catch(QueryException $ex){
             return redirect()->back()->withErrors(['Could not delete review']);
        }


    }

}
