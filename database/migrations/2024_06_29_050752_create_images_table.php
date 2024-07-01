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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_detail_id');
            $table->string('name_image');
            $table->string('url');
            $table->timestamp('create_date')->nullable();
            $table->timestamp('update_date')->nullable();
            $table->timestamps();

            // Thêm ràng buộc khóa ngoại
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');

            // Thêm index
            $table->index('product_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
