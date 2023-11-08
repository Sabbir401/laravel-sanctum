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
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("ordered_product_id");
            $table->string('rating_value',20);
            $table->string('comment',200);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('site_users')->onDelete('cascade');
            $table->foreign('ordered_product_id')->references('id')->on('order_lines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
