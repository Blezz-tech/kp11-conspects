<?php

namespace App\Http\Controllers;

use Auth;
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

    public function confirm(Order $order)
    {
        $order->status = 'подтверждено';
        $order->save();
        return redirect('admin/orders')->with('success', 'Статус заказа изменен');
    }

    public function cancel(Request $request, Order $order)
    {
        $order->status = 'отменено';
        $order->comment = $request->comment;
        $order->save();
        return redirect('admin/orders')->with('success', 'Статус заказа изменен');
    }

    public function send(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            $order = Auth::user()->orders()->firstWhere('status', 'в корзине');
            $order->status = 'новый';
            $order->save();

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 'в корзине';
            $order->save();

            return redirect('/catalog')->with('success', 'Заказ отправлен');
        }
        else {
            return redirect()->back()->with('error', 'Неправильный пароль');
        }
    }

    public function list()
    {
        $orders = Auth::user()->orders()->orderBy('created_at')->get();

        return view('orders', ['orders' => $orders]);
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
        $order->products()->detach();
        $order->delete();
        return redirect()->back()->with('success', 'Заказ удален');
    }
}
