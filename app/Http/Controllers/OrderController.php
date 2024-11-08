<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = new Collection();

        if ($request->status == 'нет') {
            $orders = Order::where('status', '!=', 'в корзине')
                ->withCount('products')
                ->get();
        } else {
            $orders = Order::where('status',  $request->status)
                ->withCount('products')
                ->get();
        }

        return view('admin.orders.index', ['orders' => $orders]);
    }

    /** Изменить статус заказа на "подтвержден"
     *
     *(доступен для администратора)
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response **/
    public function confirm(Order $order)
    {
        //dd($order);
        $order->status = 'подтвержден';
        $order->save();
        return redirect('admin/orders')->with('info', 'Статус заказа изменен');
    }


    public function cancel(Request $request, Order $order)
    {
        //dd($order);
        $order->status = 'отменен';
        $order->comment = $request->coment;
        $order->save();
        return redirect('admin/orders')->with('info', 'Статус заказа изменен');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
