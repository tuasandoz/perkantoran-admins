<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::with(['orders'])->get();

        return response()->json(['status' => 'success', 'data' => $customers]);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'avatar' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'provider_id' => 'required',
            'provider' => 'required',
            'remember_token' => 'required',
            'password' => 'required'


        ]);
        if ($validasi->fails()) {
            return response()->json(['status' => 'error', 'message' => $validasi->errors()]);
        }

        $customers = new Customers();
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->email_verified_at = $request->email_verified_at;
        $customers->phone = $request->phone;
        $customers->gender = $request->gender;
        $customers->avatar = $request->avatar;
        $customers->dob = $request->dob;
        $customers->password = $request->password;
        $customers->provider_id = $request->provider_id;
        $customers->provider = $request->provider;
        $customers->remember_token = $request->remember_token;
        $customers->password = $request->password;
        $customers->save();

        return response()->json(['status' => 'success', 'data' => $customers]);
    }
    public function show($id)
    {
        $customers = Customers::with(['orders'])->where('id', $id)->first();
        return response()->json(['status' => 'success', 'data' => $customers]);
    }
    //mengubahdata
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'avatar' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'provider_id' => 'required',
            'provider' => 'required',
            'remember_token' => 'required',
            'password' => 'required'

        ]);
        if ($validasi->fails()) {
            return response()->json(['status' => 'error', 'message' => $validasi->errors()]);
        }

        $customers = Customers::where('id', $id)->first();
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->email_verified_at = $request->email_verified_at;
        $customers->phone = $request->phone;
        $customers->gender = $request->gender;
        $customers->avatar = $request->avatar;
        $customers->dob = $request->dob;
        $customers->password = $request->password;
        $customers->provider_id = $request->provider_id;
        $customers->provider = $request->provider;
        $customers->remember_token = $request->remember_token;
        $customers->password = $request->password;
        $customers->save();

        return response()->json(['status' => 'success', 'data' => $customers]);
    }

    public function delete($id)
    {
        $customers = Customers::where('id', $id)->first();

        $customers->delete();

        return response()->json(['status' => 'success', 'data' => $customers]);
    }
}
