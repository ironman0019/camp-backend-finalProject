<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketFile;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket\TicketCategory;
use Illuminate\Support\Facades\Storage;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with('file', 'children')->where('user_id', Auth::user()->id)->whereNull('parent_id')->get(); 
        $ticketCategories = TicketCategory::all();
        return view('app.user-dashbord.user-tickets', compact('tickets', 'ticketCategories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FileUploadService $fileUploadService)
    {
        $inputs = $request->validate([
            'category_id' => 'required|exists:ticket_categories,id|integer',
            'subject' => 'required|string|min:4|max:255',
            'body' => 'required|string|min:4|max:2000',
            'file' => 'mimes:png,jpg,jpeg,pdf,txt,doc,docx,zip,rar|nullable'
        ]);

        $user = Auth::user();

        $ticket = Ticket::create([
            'reference_id' => 1,
            'user_id' => $user->id,
            'category_id' => $inputs['category_id'],
            'subject' => $inputs['subject'],
            'body' => $inputs['body']
        ]);

        if ($request->hasFile('file')) {
            $result = $fileUploadService->uploadFile($request->file('file'));
            if ($result === false) {
                return back()->with('swal-error', 'خطا در آپلود فایل');
            }
            $inputs['file_path'] = $result['path'];
            $inputs['file_type'] = $result['type'];
            $inputs['file_size'] = $result['size'];

            $ticketFile = TicketFile::create([
                'user_id' => $user->id,
                'ticket_id' => $ticket->id,
                'file_path' => $inputs['file_path'],
                'file_size' => $inputs['file_size'],
                'file_type' => $inputs['file_type']
            ]);

        }

        return back()->with('success', 'تیکت با موفقیت ثبت شد');


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
