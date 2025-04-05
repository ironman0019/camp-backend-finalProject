<?php

use App\Http\Controllers\Admin\Market\TagController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\ProductItemController;
use App\Http\Controllers\Home\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function() {
    //TODO
});



require __DIR__.'/auth.php';


Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {

    Route::get('/', DashbordController::class);

    Route::prefix('setting')->name('setting.')->group(function() {
        //TODO
    });

    Route::prefix('content')->name('content.')->group(function() {
        //TODO
    });

    Route::prefix('tickets')->name('tickets.')->group(function() {
        // Ticket Category
        Route::resource('ticket-category', TicketCategoryController::class);
        // Tickets
        Route::resource('ticket', TicketController::class);
        Route::get('ticket/status/{ticket}', [TicketController::class, 'status'])->name('ticket.status');

    });

    Route::prefix('market')->name('market.')->group(function() {
        // Tags
        Route::resource('tag', TagController::class);
        // Products
        Route::resource('product', ProductController::class);
        Route::get('product/file/download/{filePath}', [ProductController::class, 'downloadFile'])->where('filePath', '.*')->name('product.download-file');
        Route::get('product/change/discount-status/{product}', [ProductController::class, 'discountStatus'])->name('product.change.discount-status');
        Route::put('product/add-discount/{product}', [ProductController::class, 'addDiscount'])->name('product.add-discount');
        // Product_items
        Route::get('product-items/index/{product}', [ProductItemController::class, 'index'])->name('product-items.index');
        Route::get('product-items/create/{product}', [ProductItemController::class, 'create'])->name('product-items.create');
        Route::get('product-items/edit/{productItem}/{product}', [ProductItemController::class, 'edit'])->name('product-items.edit');
        Route::post('product-items/store/{product}', [ProductItemController::class, 'store'])->name('product-items.store');
        Route::put('product-items/update/{productItem}/{product}', [ProductItemController::class, 'store'])->name('product-items.update');
        Route::delete('product-items/delete/{productItem}', [ProductItemController::class, 'destroy'])->name('product-items.destroy');
        Route::get('product-items/file/download/{filePath}', [ProductItemController::class, 'downloadFile'])->where('filePath', '.*')->name('product-items.download-file');
        Route::put('product-items/rename-file-item/{productItem}', [ProductItemController::class, 'renameFile'])->name('product-items.rename-file');
        

    });


});
