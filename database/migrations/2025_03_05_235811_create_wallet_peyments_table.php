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
        Schema::create('wallet_peyments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained('wallets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('peyment_id')->nullable()->constrained('peyments')->onDelete('cascade')->onUpdate('cascade');
            $table->text('peyment_object')->nullable();
            $table->unsignedBigInteger('charge_amount');
            $table->tinyInteger('peyment_status')->default(0)->comment('0 => pending, 1 => ok, 2 => failed');
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
        Schema::dropIfExists('wallet_peyments');
    }
};
