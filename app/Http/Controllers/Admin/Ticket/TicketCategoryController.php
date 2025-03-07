<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketCategoryRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketCategoryRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TicketCategoryController extends Controller
{
    public function index()
    {
        $tickets = TicketCategory::paginate(10);
        return view('admin.ticket.ticket-category.index', compact('tickets'));
    }

    public function create()
    {
        return view('admin.ticket.ticket-category.create');
    }

    public function store(StoreTicketCategoryRequest $request): RedirectResponse
    {
        TicketCategory::create($request->validated());
        return to_route('admin.tickets.ticket-category.index');
    }

    public function edit(TicketCategory $ticketCategory)
    {
        return view('admin.ticket.ticket-category.edit', compact('ticketCategory'));
    }

    public function update(UpdateTicketCategoryRequest $request, TicketCategory $ticketCategory): RedirectResponse
    {
        $ticketCategory->update($request->validated());
        return to_route('admin.tickets.ticket-category.index');
    }

    public function destroy($id)
    {
    }
}
