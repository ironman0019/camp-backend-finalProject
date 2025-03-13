<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.market.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.market.tag.create');
    }

    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());
        return to_route('admin.market.tag.index')->with('swal-success', 'تگ با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
