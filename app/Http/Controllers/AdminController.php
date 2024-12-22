<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Panel.
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('admin.panel', [
            'tickets' => $tickets]
        );
    }

    public function acceptTicketPage(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя изменить']);
        }

        if (!$ticket) {
            return redirect()
                ->route('admin.panel')
                ->withErrors(['Тикета не существует']);
        }

        return view('admin.ticket.accept', [
            'ticket' => $ticket
        ]);
    }

    public function acceptTicket(Request $request, $ticketId)
    {
        // TODO
    }

    public function rejectTicketPage(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя изменить']);
        }

        if (!$ticket) {
            return redirect()
                ->route('admin.panel')
                ->withErrors(['Тикета не существует']);
        }

        return view('admin.ticket.reject', [
            'ticket' => $ticket
        ]);
    }

    public function rejectTicket(Request $request, $ticketId)
    {
        $credentials = $request->validate([
            'comment' => 'required|string|min:5',
        ]);

        $ticket = Ticket::find($ticketId);

        $ticket->state_id = 3;
        $ticket->comment = $credentials['comment'];
        $ticket->save();

        return redirect()
            ->route('admin.panel')
            ->with(['Тикет успешно отклонён']);
    }

    public function categoriesPage()
    {
        $categories =  Category::all();
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function deleteCategory(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();
        return redirect()
            ->route('admin.category.index')
            ->with(['Категория успешно удалена']);
    }

}
