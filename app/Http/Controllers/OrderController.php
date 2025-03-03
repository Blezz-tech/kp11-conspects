<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        // $order = Order::with('services')->findOrFail($id);
        $order = Order::all();
        return view('order', compact('order'));
    }
}
