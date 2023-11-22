<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\country;
use App\Models\site_user;
use App\Models\user_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $url= url('/register');
        $title = "User Registration";
        $data = compact('url', 'title');

        return view('/user/registration', compact('countries'))->with($data);
    }

    public function register(Request $request)
    {

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
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
                'phone' => 'required',
                'unit_number' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
            ]
        );
        try {
            DB::beginTransaction();

            // Create a new SiteUser
            $siteUser = site_user::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'Phone_number' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
            ]);

            // Create a new Address
            $address = address::create([
                'unit_number' => $request->input('unit_number'),
                'street_number' => $request->input('street_address'),
                'address_line1' => $request->input('address_1'),
                'address_line2' => $request->input('address_2'),
                'city' => $request->input('city'),
                'region' => $request->input('region'),
                'post_code' => $request->input('postal_code'),
                'country_id' => $request->input('country'),
            ]);

            // Create a new UserAddress
            $userAddress = user_address::create([
                'user_id' => $siteUser->id,
                'address_id' => $address->id,
            ]);

            DB::commit();

            return redirect('register')->with('success', 'User information inserted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            // Handle the error as needed
            return redirect('register')->with('error', 'An error occurred while inserting user information.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(site_user $site_user)
    {
        $site_user = site_user::all();
        $site_user = site_user::paginate(5);
        $data = compact('site_user');
        return view('/user/user')->with($data);
    }

    public function trash()
    {
        $site_user = site_user::with('userAddress.address')->onlyTrashed()->get();
        $data = compact('site_user');
        return view('/user/userTrash')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siteUserData = site_user::with('userAddress.address.findCountry')->find($id);
        // Check if the SiteUser is found
        if ($siteUserData) {
            // $siteUserData contains the data from the site_user, user_address, and address tables
            $countries = country::all();
            $url = url('user/update').'/'.$id;
            $title = 'Update Profile';
            $data = compact('siteUserData','url', 'title', 'countries');
            return view('/user/userUpdate')->with($data);
        } else {
            // Handle the case where the SiteUser is not found, for example, redirect to an error page or display a message.
            return "Data Not Found";
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $siteUserData = site_user::with('userAddress.address')->find($id);

        $siteUserData->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'Phone_number' => $request->input('phone'),
        ]);

        $siteUserData->userAddress->address->update([
            'unit_number' => $request->input('unit_number'),
            'street_number' => $request->input('street_address'),
            'address_line1' => $request->input('address_1'),
            'address_line2' => $request->input('address_2'),
            'city' => $request->input('city'),
            'region' => $request->input('region'),
            'post_code' => $request->input('postal_code'),
        ]);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(site_user $site_user)
    {

    }
    public function delete($id)
    {

        try {
            DB::beginTransaction();
            $site_user = site_user::with('userAddress.address')->find($id);
            if (!is_null($site_user)){
                $site_user->delete();
                $site_user->userAddress->delete();
                $site_user->userAddress->address->delete();
            }
            DB::commit();

            return redirect('/user')->with('Successfully Deleted');

        }catch (\Exception $e) {
            DB::rollback();

            return redirect('/user')->with('error', 'An error occurred while inserting user information.');
        }
    }

    public function restore($id)
    {
        try {
            DB::beginTransaction();
            $site_user = site_user::with('userAddress.address')->withTrashed()->find($id);
            if (!is_null($site_user)){
                $site_user->restore();
                $site_user->userAddress->restore();
                $site_user->userAddress->address->restore();
                dd($site_user);
        }
        DB::commit();

        return redirect('/user')->with('Successfully Resotred');

        }catch (\Exception $e) {
            DB::rollback();

            return redirect('/user')->with('error', 'An error occurred while inserting user information.');
        }

    }

    public function details($id)
    {
        $siteUserData = site_user::with('userAddress.address.findCountry')->find($id);
        // Check if the SiteUser is found
        if ($siteUserData) {
            // Now $siteUserData contains the data from the site_user, user_address, and address tables
            return view('/user/userProfile', compact('siteUserData'));
        } else {
            // Handle the case where the SiteUser is not found, for example, redirect to an error page or display a message.
            return "Data Not Found";
        }
    }
}
