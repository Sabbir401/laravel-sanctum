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
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->date("order_date");
            $table->unsignedBigInteger("payment_method_id");
            $table->unsignedBigInteger("shipping_address_id");
            $table->unsignedBigInteger("shipping_method_id");
            $table->unsignedBigInteger("order_total");
            $table->unsignedBigInteger("order_status_id");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('site_users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('user_payment_methods')->onDelete('cascade');
            $table->foreign('shipping_address_id')->references('id')->on('user_addresses')->onDelete('cascade');
            $table->foreign('shipping_method_id')->references('id')->on('shopping_methods')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_orders');
    }
};
