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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number', 50);
            $table->string('street_number', 50);
            $table->string('address_line1', 100);
            $table->string('address_line2', 100);
            $table->string('city', 40);
            $table->string('region', 40);
            $table->string('post_code', 10);
            $table->unsignedBigInteger('country_id');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
