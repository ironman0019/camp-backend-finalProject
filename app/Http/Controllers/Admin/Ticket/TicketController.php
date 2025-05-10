<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::query()
            ->ticketParent()
            ->paginate(10);
        return view('admin.ticket.tickets.index', compact('tickets'));
    }

    public function store(StoreTicketRequest $request): RedirectResponse
    {
        $inputs = $request->validated();

        // Fetch record
        $ticket = Ticket::query()
            ->where('id', $inputs['parent_id'])
            ->first();

        // Create ticket answer
        auth()->user()->tickets()->create(
            $inputs +
            [
                'subject'      => $ticket->subject,
                'reference_id' => auth()->user()->admin->id,
                'category_id'  => $ticket->category_id,
                'parent_id'    => $ticket->id
            ]);

        // Initial reference id for main ticket
        $ticket->update(['reference_id' => auth()->user()->admin->id]);

        // Redirect
        return to_route('admin.tickets.ticket.index')->with('swal-success', 'پاسخ تیکت با موفقیت ثبت شد');
    }

    public function show(Ticket $ticket)
    {
        return view('admin.ticket.tickets.show', compact('ticket'));
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return to_route('admin.tickets.ticket.index')->with('swal-success', 'تیکت با موفقیت حذف شد');
    }

    public function status(Ticket $ticket): RedirectResponse
    {
        $ticket->status = $ticket->status->value === 0 ? 1 : 0;

        // Change children status
        if ($ticket->status->value) {
            $ticket->children()?->each(fn($ticket) => $ticket->update(['status' => 1]));
        } else {
            $ticket->children()?->each(fn($ticket) => $ticket->update(['status' => 0]));
        }

        $ticket->save();
        return to_route('admin.tickets.ticket.index')->with('swal-success', 'وضعیت تیکت با موفقیت تغییر کرد');
    }

    // Download file 
    public function downloadFile(TicketFile $ticketFile)
    {
        $filePath = $ticketFile->file_path;
        if (!Storage::exists($filePath)) {
            return 'file not found';
        }

        return Storage::download($filePath);
    }


}
