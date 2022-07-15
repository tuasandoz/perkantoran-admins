<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admins ::with(['orders'])->get();

        return response()->json(['status' => 'success', 'data' => $admins]);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'sign_at' => 'required'


        ]);
        if ($validasi->fails()) {
            return response()->json(['status' => 'error', 'message' => $validasi->errors()]);
        }

        $admins = new Admins();
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->username = $request->username;
        $admins->password = $request->password;
        $admins->sign_at = $request->sign_at;
        $admins->save();

        return response()->json(['status' => 'success', 'data' => $admins]);
    }
    public function show($id)
    {
        $admins = Admins::with(['orders'])->where('id', $id)->first();
        return response()->json(['status' => 'success', 'data' => $admins]);
    }
    //mengubahdata
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'sign_at' => 'required'


        ]);
        if ($validasi->fails()) {
            return response()->json(['status' => 'error', 'message' => $validasi->errors()]);
        }

        $admins = Admins::where('id', $id)->first();
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->username = $request->username;
        $admins->password = $request->password;
        $admins->sign_at = $request->sign_at;
        $admins->save();

        return response()->json(['status' => 'success', 'data' => $admins]);
    }

    public function delete($id)
    {
        $admins = Admins::where('id', $id)->first();

        $admins->delete();

        return response()->json(['status' => 'success', 'data' => $admins]);
    }
}
