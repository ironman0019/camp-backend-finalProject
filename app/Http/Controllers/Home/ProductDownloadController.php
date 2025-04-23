<?php

namespace App\Http\Controllers\Home;

use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\ProductItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductDownloadController extends Controller
{

    public function index(Product $product, Order $order)
    {
        return view('app.file-download', compact('product', 'order'));
    }


    public function download($type, $id, Order $order)
    {
        $user = Auth::user();

        if ($order->user_id !== $user->id || $order->order_status != 2 || $order->peyment_status != 1) {
            abort(403, 'You are not authorized to download this file.');
        }

        $model = match ($type) {
            'product' => Product::findOrFail($id),
            'productItem' => ProductItem::findOrFail($id),
            default => abort(404, 'Invalid download type.')
        };

        $filePath = $model->file_path;

        if (!Storage::exists($filePath)) {
            return 'file not found';
        }

        return Storage::download($filePath);
        
    }


}
