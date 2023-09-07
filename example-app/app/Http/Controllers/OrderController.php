<?php

namespace App\Http\Controllers;
use App\Models\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //
        $orders = Order::all();
        return view('orders', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('orderDetails', ['order' => $order]);
    }




}
