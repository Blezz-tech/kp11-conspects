<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin()
    {
        return view('layouts.adminlayout');
    }

    public function admin_orders()
    {
        $orders = Order::all();
        return view('admin-orders', compact('orders'));
    }

    public function admin_status($order)
    {

        return view('admin-status-form', compact('order'));
    }

    public function admin_status_store(Request $request, $id)
    {

        // Валидация входящих данных
        $request->validate([
            'payment_type' => 'required|in:in_process,confirmed,cancelled',
            'rejection_reason' => 'nullable|string|max:255',
        ]);

        // Находим заявку по ID
        $application = Order::findOrFail($id);

        // Обновляем статус заявки
        $application->status = $request->input('payment_type');

        // Если статус отменен, сохраняем причину отказа
        if ($request->input('payment_type') === 'cancelled') {
            $application->rejection_reason = $request->input('rejection_reason');
        } else {
            $application->rejection_reason = null; // Сбрасываем причину отказа, если статус не отменен
        }

        // Сохраняем изменения в базе данных
        $application->save();

        // Перенаправляем пользователя с сообщением об успехе
        return redirect('/')->with('info', 'Статус заявки успешно обновлен!');

    }
}
