<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

    public function ConfirmLogout(){
        $categories = Category::all();
        $user = Auth::user();

        return view('auth.confirmLogout', array(
            'breadCrumb' => false,
            'categories' => $categories,
            'user' => $user
        ));
    }

    //debug empty cart

    public function unset(Request $request){
        $request->session()->forget('cart');
        return redirect()->back();
    }


}
