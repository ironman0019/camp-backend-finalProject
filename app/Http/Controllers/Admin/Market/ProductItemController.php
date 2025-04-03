<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Product;
use App\Models\Market\ProductItem;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Product\StoreProductItemRequest;
use App\Http\Requests\Admin\Product\UpdateProductItemRequest;
use Illuminate\Http\Request;

class ProductItemController extends Controller
{

    public function index(Product $product)
    {
        $productItems = ProductItem::where('product_id', $product->id)->with('product')->get();
        return view('admin.market.product-items.index', compact('productItems', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product-items.create', compact('product'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductItemRequest $request, FileUploadService $fileUploadService, Product $product)
    {
        $inputs = $request->all();

        if ($request->hasFile('file')) {
            $result = $fileUploadService->uploadFile($request->file('file'));
            if ($result === false) {
                return back()->with('swal-error', 'خطا در آپلود فایل');
            }
            $inputs['file_path'] = $result['path'];
            $inputs['file_type'] = $result['type'];
            $inputs['file_original_name'] = $result['original_name'];
        }

        $inputs['product_id'] = $product->id;

        ProductItem::create($inputs);
        return to_route('admin.market.product-items.index', $product)->with('swal-success', 'فایل با موفقیت ساخته شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductItem $productItem, Product $product)
    {
        return view('admin.market.product-items.edit', compact('productItem', 'product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductItemRequest $request, ProductItem $productItem, Product $product, FileUploadService $fileUploadService)
    {
        $inputs = $request->all();

        if ($request->hasFile('file')) {
            // Remove old file
            $fileUploadService->deleteFile($product->file_path);

            $result = $fileUploadService->uploadFile($request->file('file'));
            if ($result === false) {
                return back()->with('swal-error', 'خطا در آپلود فایل');
            }
            $inputs['file_path'] = $result['path'];
            $inputs['file_type'] = $result['type'];
            $inputs['file_original_name'] = $result['original_name'];
        }

        $inputs['product_id'] = $product->id;

        $productItem->update($inputs);
        return to_route('admin.market.product-items.index', $product)->with('swal-success', 'فایل با موفقیت ویرایش شد');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductItem $productItem)
    {
        $productItem->delete();
        return back()->with('swal-success', 'فایل با موفقیت حذف شد');
    }

    // Download file 
    public function downloadFile($filePath)
    {
        if (!Storage::exists($filePath)) {
            return 'file not found';
        }

        return Storage::download($filePath);
    }

    // Rename file original name
    public function renameFile(Request $request ,ProductItem $productItem)
    {
        $input = $request->validate([
            'file_original_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);

        $productItem->update($input);
        return back()->with('swal-success', 'اسم فایل با موفقیت ویرایش شد');
    }
    
}
