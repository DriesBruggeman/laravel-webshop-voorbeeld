<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;
use Auth;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function validateAddress(Request $request, $type){

        if($type === "shipping"){
            $request->validate([
                'shipping-streetname' => 'required|max:120',
                'shipping-streetnumber' => 'required|max:120',
                'shipping-postalcode' => 'required|max:8',
                'shipping-city' => 'required|max:30',
                'shipping-country' => 'required:30',
            ]);
        }else{
            $request->validate([
                'streetname' => 'required|max:120',
                'streetnumber' => 'required|max:120',
                'postalcode' => 'required|max:8',
                'city' => 'required|max:30',
                'country' => 'required:30',
            ]);
        }

    }

    private function makeAddress(Request $request, $type, $address){

        if($type === "shipping"){
            $address->streetname = $request->input('shipping-streetname');
            $address->streetnumber = $request->input('shipping-streetnumber');
            $address->postalcode = $request->input('shipping-postalcode');
            $address->city = $request->input('shipping-city');
            $address->country = $request->input('shipping-country');
            $address->type = "shipping";
        }else{
            $address->streetname = $request->input('streetname');
            $address->streetnumber = $request->input('streetnumber');
            $address->postalcode = $request->input('postalcode');
            $address->city = $request->input('city');
            $address->country = $request->input('country');
            $address->type = "both";
        }

        return $address;
    }

    public function createAddress(Request $request)
    {
        $user = Auth::user();
        $address = $user->getAddress('both')->first();

        if($address){
            return redirect(url()->previous());
        }else{
            $address = $user->getAddress('billing')->first();
            if($address){
                return redirect(url()->previous());
            }
        }

        $this->validateAddress($request, 'billing');

        $address = $this->makeAddress($request, "both", new Address());

        $user->addresses()->save($address);

        return redirect(url()->previous());
    }

    public function updateAddress(Request $request)
    {
        $this->validateAddress($request, 'billing');

        $user = Auth::user();
        $address = $user->getAddress('both')->first();

        if(!$address){
            $address = $user->getAddress('billing')->first();
            if(!$address){
                abort(404);
            }
        }

        $address = $this->makeAddress($request, "both", $address);

        $user = Auth::user();

        $user->addresses()->save($address);

        return redirect(url()->previous());
    }

    public function createShippingAddress(Request $request)
    {
        $user = Auth::user();

        $address = $user->getAddress('shipping')->first();
        if($address){
            return redirect(url()->previous());
        }

        $this->validateAddress($request, "shipping");

        $address = new Address();

        $address = $this->makeAddress($request, "shipping", $address);

        $makebillingaddress = $user->getAddress('both')->first();
        $makebillingaddress->type = "billing";
        $user->addresses()->save($makebillingaddress);

        $user->addresses()->save($address);

        return redirect(url()->previous());
    }

    public function updateShippingAddress(Request $request)
    {
        $this->validateAddress($request, "shipping");

        $user = Auth::user();
        $address = $user->getAddress('shipping')->first();

        //dd($address);

        if(!$address){
            abort(404);
        }

        $address = $this->makeAddress($request, "shipping", $address);

        $user->addresses()->save($address);

        return redirect(url()->previous());
    }

    public function removeShippingAddress(){
        try{
            $user = Auth::user();
            $address = $user->getAddress('shipping')->first();
            $address->delete();

            $billingaddress =  $user->getAddress('billing')->first();
            $billingaddress->type = "both";
            $user->addresses()->save($billingaddress);

            return redirect(url()->previous());
        }catch (\Illuminate\Database\QueryException $e){
            return redirect(url()->previous())->withErrors(['The Address could not be deleted. An order may be shipping to the address.']);
        }


    }
}
