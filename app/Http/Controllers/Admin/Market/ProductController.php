<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Models\Market\ProductCategory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.market.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $tags = Tag::all();
        return view('admin.market.product.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ImageUploadService $imageUploadService, FileUploadService $fileUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        if($request->hasFile('file')) {
            $result = $fileUploadService->uploadFile($request->file('file'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود فایل');
            }
            $inputs['file_path'] = $result['path'];
            $inputs['file_type'] = $result['type'];
            $inputs['file_original_name'] = $result['original_name'];
        }

        $product = Product::create($inputs);
        $product->tags()->attach($inputs['tag_id']);
        return to_route('admin.market.product.index')->with('swal-success', 'محصول با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.market.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $tags = Tag::all();
        return view('admin.market.product.edit', compact('tags', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, ImageUploadService $imageUploadService, FileUploadService $fileUploadService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')) {
            // Remove old image
            $imageUploadService->removeImage($product->image);

            $result = $imageUploadService->uploadImage($request->file('image'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود عکس');
            }
            $inputs['image'] = $result;
        }

        if($request->hasFile('file')) {
            // Remove old file
            $fileUploadService->deleteFile($product->file_path);

            $result = $fileUploadService->uploadFile($request->file('file'));
            if($result === false) {
                return back()->with('swal-error', 'خطا در آپلود فایل');
            }
            $inputs['file_path'] = $result['path'];
            $inputs['file_type'] = $result['type'];
            $inputs['file_original_name'] = $result['original_name'];
        }

        $product->update($inputs);
        $product->tags()->sync($inputs['tag_id']);
        return to_route('admin.market.product.index')->with('swal-success', 'محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('swal-success', 'محصول با موفقیت حذف شد');
    }

    // Download file 
    public function downloadFile($filePath)
    {
        if (!Storage::exists($filePath)) {
            return 'file not found';
        }

        return Storage::download($filePath);
    }

    // Change discount status
    public function discountStatus(Product $product)
    {
        if($product->discount_status) {
            $product->discount_status = 0;
            $product->save();
        }
        else
        {
            $product->discount_status = 1;
            $product->save();
        }
        return back()->with('swal-success', 'وضعیت تخفیف محصول تغییر کرد');
    }

    // Add discount
    public function addDiscount(Request $request ,Product $product)
    {
        $inputs = $request->validate([
            'discount_percent' => 'required|numeric|min:1|max:99'
        ]);

        $off_price = ($product->price * $inputs['discount_percent']) / 100;
        $product->update([
            'discount_percent' => $inputs['discount_percent'],
            'off_price' => $off_price
        ]);
        return back()->with('swal-success', 'تخفیف اضافه شد');
    }


}
