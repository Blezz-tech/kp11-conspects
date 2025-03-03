<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin(){
        return view('layouts.adminlayout');
    }

    public function admin_orders(){
        $orders = Order::all();



        return view('admin-orders', compact('orders'));
    }
}
