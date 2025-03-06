<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Home\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function() {
    //TODO
});



require __DIR__.'/auth.php';


Route::prefix('admin')->middleware([])->name('admin.')->group(function() {

    Route::get('/', DashbordController::class);

    Route::prefix('setting')->name('setting.')->group(function() {
        //TODO
    });

    Route::prefix('content')->name('content.')->group(function() {
        //TODO
    });

    Route::prefix('tickets')->name('tickets.')->group(function() {
        //TODO

    });

    Route::prefix('market')->name('market.')->group(function() {
        // TODO
    });


});
