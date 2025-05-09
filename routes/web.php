<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Home\UserTicketController;
use App\Http\Controllers\Admin\Market\TagController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Home\UserDashbordController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Market\CoupanController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Market\PeymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Home\ProductDownloadController;
use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Market\ProductItemController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product/{product}/{slug}', [HomeController::class, 'product'])->name('product.show');
Route::get('search', [HomeController::class, 'search'])->name('search');


Route::middleware(['auth'])->group(function() {

    // user dashbord routes
    Route::get('user/dashbord/index', [UserDashbordController::class, 'index'])->name('user.dashbord.index');
    Route::get('user/dashbord/user-info', [UserDashbordController::class, 'userInfo'])->name('user.dashbord.user-info');
    Route::get('user/dashbord/user-orders', [UserDashbordController::class, 'userOrders'])->name('user.dashbord.user-orders');
    Route::get('user/dashbord/user-orders-detail/{order}', [UserDashbordController::class, 'userOrdersDetail'])->name('user.dashbord.user-orders-detail');
    Route::get('user/dashbord/comments', [UserDashbordController::class, 'userComments'])->name('user.dashbord.user-comments');
    Route::get('user/dashbord/user-favourites', [UserDashbordController::class, 'userFavourites'])->name('user.dashbord.user-favourites');
    Route::delete('user/dashbord/remove-from-favourite/{product}', [UserDashbordController::class, 'removeFromFavourite'])->name('user.dashbord.remove-from-favourite');
    Route::get('user/dashbord/user-ticket', [UserTicketController::class, 'index'])->name('user.dashbord.ticket.index');
    Route::post('user/dashbord/user-ticket', [UserTicketController::class, 'store'])->name('user.dashbord.ticket.store');
    Route::get('user/profile/edit/{id}', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('user/profile/update/{user}', [UserProfileController::class, 'update'])->name('user.profile.update');

    // file download routes
    Route::get('download-file/index/{product}/{order}', [ProductDownloadController::class, 'index'])->name('download-file.index');
    Route::get('download-file/{type}/{id}/{order}', [ProductDownloadController::class, 'download'])->name('download-file')->middleware('signed');

    // cart routes
    // Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    // checkout routes
    Route::get('checkout', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('checkout/apply-discount', [CheckoutController::class, 'applyDiscount'])->name('checkout.apply-discount');

    // order routes
    Route::post('order/store', [OrderController::class, 'orderStore'])->name('order.store');

    // add to favourite route
    Route::get('add_to_favourite', [HomeController::class, 'addToFavourite'])->name('product.add-to-favourite');

});



require __DIR__.'/auth.php';


Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {

    Route::get('/', [DashbordController::class, 'index'])->name('home');
    Route::get('/sale-stats', [DashbordController::class, 'getSaleStats']);

    Route::prefix('setting')->name('setting.')->group(function() {
        //TODO
    });

    Route::prefix('content')->name('content.')->group(function() {
        Route::resource('banner', BannerController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('comment', CommentController::class)->only(['index', 'show']);
        Route::get('comment/approved/{comment}', [CommentController::class, 'approved'])->name('comment.approved');
        Route::resource('menu', MenuController::class);
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

        // Product category
        Route::resource('product-category', ProductCategoryController::class);

        // Coupan
        Route::resource('coupan', CoupanController::class);

        // Peyment
        Route::resource('peyment', PeymentController::class)->only(['index']);
        

    });


});
