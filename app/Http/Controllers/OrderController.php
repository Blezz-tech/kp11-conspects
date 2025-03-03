<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        // $order = Order::with('services')->findOrFail($id);
        $order = Order::all();
        $services = Service::all();
        return view('order', compact('order', 'services'));
    }

    public function order_store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'email' => 'required|email|max:255',
            'payment_type' => 'required|string',
            'filter' => 'required|exists:services,id', // Проверка на существование услуги
        ]);

        // Получаем user_id (например, из сессии или аутентифицированного пользователя)
        $userId = auth()->id(); // Если вы используете аутентификацию

        // Сохранение данных в БД
        Order::create([
            'address' => $validatedData['address'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'email' => $validatedData['email'],
            'payment_type' => $validatedData['payment_type'],
            'user_id' => $userId, // Сохраняем user_id
            // 'service_id' => $validatedData['filter'], // Сохраняем ID услуги
        ]);

        return redirect()->back()->with('info', 'Заявка успешно отправлена!');
    }
}
