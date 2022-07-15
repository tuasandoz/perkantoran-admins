<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function index()
    {
        $orders  = Orders::with(['customer'])->get();
        return response()->json(['status' => 'success', 'data' => $orders]);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'cart_id' => 'required',
            'invoice_id' => 'required',
            'order_number' => 'required',
            'marking_code' => 'required',
            'tracking_number' => 'required',
            'product_name' => 'required',
            'product_cover' => 'required',
            'category_id_blueray' => 'required',
            'last_status' => 'required',
            'paid_at' => 'required',
            'shipping_method' => 'required',
            'total_weight' => 'required',
            'total_cbm' => 'required',
            'freight_package' => 'required',
            'created' => 'required'


        ]);
        if ($validasi->fails()) {
            return response()->json(['status' => 'error', 'message' => $validasi->errors()]);
        }

        $orders = new Orders();
        $orders->user_id = $request->user_id;
        $orders->cart_id = $request->cart_id;
        $orders->invoice_id = $request->invoice_id;
        $orders->order_number = $request->order_number;
        $orders->marking_code = $request->marking_code;
        $orders->tracking_number = $request->tracking_number;
        $orders->product_name = $request->product_name;
        $orders->product_cover = $request->product_cover;
        $orders->category_id_blueray = $request->category_id_blueray;
        $orders->last_status = $request->last_status;
        $orders->paid_at = $request->paid_at;
        $orders->shipping_method = $request->shipping_method;
        $orders->total_weight = $request->total_weight;
        $orders->total_cbm = $request->total_cbm;
        $orders->freight_package = $request->freight_package;
        $orders->created = $request->created;
        $orders->save();

        return response()->json(['status' => 'success', 'data' => $orders]);
    }
    public function show($id)
    {
        $orders = Orders::with(['customer'])->where('id', $id)->first();
        return response()->json(['status' => 'success', 'data' => $orders]);
    }
    //mengubahdata
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'cart_id' => 'required',
            'invoice_id' => 'required',
            'order_number' => 'required',
            'marking_code' => 'required',
            'tracking_number' => 'required',
            'product_name' => 'required',
            'product_cover' => 'required',
            'category_id_blueray' => 'required',
            'last_status' => 'required',
            'paid_at' => 'required',
            'shipping_method' => 'required',
            'total_weight' => 'required',
            'total_cbm' => 'required',
            'freight_package' => 'required',
            'created' => 'required'

        ]);
        if ($validasi->fails()) {
            return response()->json(['status' => 'error', 'message' => $validasi->errors()]);
        }

        $orders = Orders::where('id', $id)->first();
        $orders->user_id = $request->user_id;
        $orders->cart_id = $request->cart_id;
        $orders->invoice_id = $request->invoice_id;
        $orders->order_number = $request->order_number;
        $orders->marking_code = $request->marking_code;
        $orders->tracking_number = $request->tracking_number;
        $orders->product_name = $request->product_name;
        $orders->product_cover = $request->product_cover;
        $orders->category_id_blueray = $request->category_id_blueray;
        $orders->last_status = $request->last_status;
        $orders->paid_at = $request->paid_at;
        $orders->shipping_method = $request->shipping_method;
        $orders->total_weight = $request->total_weight;
        $orders->total_cbm = $request->total_cbm;
        $orders->freight_package = $request->freight_package;
        $orders->created = $request->created;
        $orders->save();

        return response()->json(['status' => 'success', 'data' => $orders]);
    }

    public function delete($id)
    {
        $orders = Orders::where('id', $id)->first();

        $orders->delete();

        return response()->json(['status' => 'success', 'data' => $orders]);
    }
}
