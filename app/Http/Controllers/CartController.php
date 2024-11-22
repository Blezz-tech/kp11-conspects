<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($product_id)
    {

        $order = Auth::user()->orders()->firstWhere('status', 'в корзине');

        $product = $order->products()->find($product_id);

        if ($product) {
            $qty = $product->pivot->qty + 1;
            $order->products()->updateExistingPivot($product->id, ['qty' => $qty]);
        } else {
            $order->product()->attach($product->id, ['qty' => 1]);
        }

        return redirect()->back()->with('info', 'Товар добавлен в корзину');
    }

    public function show()
    {
        $order = Auth::user()->orders()->firstWhere('status', 'в корзине');

        return view('cart', ['products' => $order == null ? null : $order->products]);
    }

    public function change($product_id, Request $request)
    {

        $order = Auth::user()->orders()->firstWhere('status', 'в корзине');

        $order->products()->updateExistingPivot($product_id, ['qty' => $request->input('qty')]);
        //обновить данные в существующих записях промежуточной (pivot) таблицы (order_product) $order->products()->updateExistingPivot($product_id, ['qty' => $request->qty]);
        return redirect()->back()->with('info', 'количество изменено');

    }


    public function delete($product_id)
    {
        $order = Auth::user()->orders()->firstWhere('status', 'в корзине');

       $order->products()->detach($product_id);
        //удалить модель из отношения (удалить товар из заказа) $order->products()->detach($product_id);
        return redirect()->back()->with('info', 'товар удален');
    }

}
