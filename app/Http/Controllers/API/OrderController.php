<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // all orders
    public function index()
    {
        $orders = Order::all()->toArray();
        return array_reverse($b);
    }

    // add order
    public function add(Request $request)
    {
        $order = new Order([
            'order_number' => $request->order_number,
            
        ]);
        $order->save();

        return response()->json('The Order is successfully added');
    }

    // edit order
    public function edit($id)
    {
        $order = Order::find($id);
        return response()->json($orders);
    }

    // update 
    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $order->update($request->all());

        return response()->json('The Order is successfully updated');
    }

    // delete book
    public function delete($id)
    {
        $order = Orders::find($id);
        $order->delete();

        return response()->json('The Order is successfully deleted');
    }
}
