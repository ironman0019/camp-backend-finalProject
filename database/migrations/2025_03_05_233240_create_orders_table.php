<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('peyment_id')->nullable()->constrained('peyments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('coupan_id')->nullable()->constrained('coupans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->text('peyment_object')->nullable();
            $table->tinyInteger('peyment_type')->default(0)->comment('0 => online, 1 => offline, 2 => user_wallet' );
            $table->tinyInteger('peyment_status')->default(0)->comment('0 => pending, 1 => ok, 2 => failed');
            $table->unsignedBigInteger('order_final_amount');
            $table->unsignedBigInteger('order_discount_amount');
            $table->unsignedBigInteger('order_total_discount_amount');
            $table->tinyInteger('order_status')->default(0)->comment('0 => pending, 1 => in progress, 2 => ok, 3 => failed, 4 => refund');
            $table->text('tracking_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
