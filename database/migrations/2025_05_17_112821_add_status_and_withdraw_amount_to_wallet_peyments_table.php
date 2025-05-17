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
        Schema::table('wallet_peyments', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->comment('0 => increase, 1 => decrease')->after('peyment_status');
            $table->unsignedBigInteger('withdraw_amount')->nullable()->after('charge_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wallet_peyments', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('withdraw_amount');
        });
    }
};
