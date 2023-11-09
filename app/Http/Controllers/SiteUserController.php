<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\country;
use App\Models\site_user;
use App\Models\user_address;
use Illuminate\Http\Request;

class SiteUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=country::get('country_name');
        // dd($data);
        $countries = country::all();

        return view('registration', compact('countries'));
    }

    public function register(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
                'phone' => 'required',
                'unit_number' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
            ]
            );


        echo "<pre>";
        print_r($request->all());
        // $abc = "abcdef";



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
                'phone' => 'required',
                'unit_number' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
            ]
        );

        $siteUser = new site_user;
        $address = new address;
        $userAddress = new user_address;

        $siteUser->name = $request['name'];
        $siteUser->email = $request['email'];
        $siteUser->Phone_number = $request['phone'];
        $siteUser->password = md5($request['passowrd']);
        $siteUser->save();

        $siteUserId = $siteUser->getkey();

        $address->unit_number = $request['unit_number'];
        $address->street_number	 = $request['street_address'];
        $address->address_line1 = $request['address_1'];
        $address->address_line2 = $request['address_2'];
        $address->city = $request['city'];
        $address->region = $request['region'];
        $address->post_code = $request['postal_code'];
        $address->country_id = $request['country'];
        $address->save();

        $addressId = $address->getkey();

        $userAddress->user_id = $siteUserId;
        $userAddress->address_id = $addressId;
        $userAddress->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(site_user $site_user)
    {
        return view('customer');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(site_user $site_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, site_user $site_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(site_user $site_user)
    {
        //
    }
}
