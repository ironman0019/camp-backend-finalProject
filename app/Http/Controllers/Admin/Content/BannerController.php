<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\StoreBannerRequest;
use App\Http\Requests\Admin\Content\UpdateBannerRequest;
use App\Models\Banner;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.content.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();
        $banners = Banner::all();

        foreach($banners as $banner) {
            if($banner && $banner->position == 1 && $inputs['position'] == 1 || $banner->position == 2 && $inputs['position'] == 2) {
                if($request->hasFile('image')) {
                    // Remove old image
                    $imageUploadService->removeImage($banner->image);
        
                    $result = $imageUploadService->uploadImage($request->file('image'));
                    if($result === false) {
                        return back()->with('swal-error', 'خطا در آپلود عکس');
                    }
                    $inputs['image'] = $result;
                }
               $banner->update($inputs);
               return to_route('admin.content.banner.index')->with('swal-success', 'بنر با موفقیت ویرایش شد'); 
            }
        }

        if($request->hasFile('image')) {
            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        Banner::create($inputs);
        return to_route('admin.content.banner.index')->with('swal-success', 'بنر با موفقیت ساخته شد');
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
    public function edit(Banner $banner)
    {
        return view('admin.content.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner, ImageUploadService $imageUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            // Remove old image
            $imageUploadService->removeImage($banner->image);

            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        $banner->update($inputs);
        return to_route('admin.content.banner.index')->with('swal-success', 'بنر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner, ImageUploadService $imageUploadService)
    {
        // Delete image from project folders
        $imageUploadService->removeImage($banner->image);

        $banner->delete();
        return back()->with('swal-success', 'بنر با موفقیت حذف شد');
    }
}
