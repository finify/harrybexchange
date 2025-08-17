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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->decimal('buy_amount', 15, 2)->nullable();
            $table->decimal('sell_amount', 15, 2)->nullable();
            $table->string('transaction_id')->unique();
            $table->string('trade_type'); // 'buy' or 'sell' or 'redeem'
            $table->string('trade_name')->nullable();
            $table->unsignedBigInteger('coin_id')->nullable();
            $table->unsignedBigInteger('giftcard_id')->nullable();
            $table->json('trade_details')->nullable();
            $table->enum('trade_status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
