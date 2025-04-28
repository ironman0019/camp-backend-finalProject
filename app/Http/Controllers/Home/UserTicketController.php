<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.user-dashbord.user-tickets');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FileUploadService $fileUploadService)
    {
        //
    }

}
