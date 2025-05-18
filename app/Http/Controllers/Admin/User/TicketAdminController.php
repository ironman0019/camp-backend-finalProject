<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreTicketAdminRequest;
use App\Http\Requests\Admin\User\UpdateTicketAdminRequest;
use App\Models\Ticket\TicketAdmin;
use App\Models\Ticket\TicketCategory;
use App\Models\User;
use Illuminate\Http\Request;

class TicketAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketAdmins = TicketAdmin::with('user', 'ticketCategory')->get();
        return view('admin.user.ticket-admin.index', compact('ticketAdmins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = User::where('is_admin', 1)->get();
        $categories = TicketCategory::all();
        return view('admin.user.ticket-admin.create', compact('admins', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketAdminRequest $request)
    {
        $inputs = $request->all();
        TicketAdmin::create($inputs);
        return to_route('admin.user.ticket-admin.index')->with('swal-success', 'تیکت ادمین با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketAdmin $ticketAdmin)
    {
        $admins = User::where('is_admin', 1)->get();
        $categories = TicketCategory::all();
        return view('admin.user.ticket-admin.edit', compact('ticketAdmin', 'admins', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketAdminRequest $request, TicketAdmin $ticketAdmin)
    {
        $inputs = $request->all();
        $ticketAdmin->update($inputs);
        return to_route('admin.user.ticket-admin.index')->with('swal-success', 'تیکت ادمین با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketAdmin $ticketAdmin)
    {
        $ticketAdmin->delete();
        return to_route('admin.user.ticket-admin.index')->with('swal-success', 'تیکت ادمین با موفقیت حذف شد');
    }
}
