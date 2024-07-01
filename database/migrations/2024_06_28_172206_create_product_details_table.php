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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('import_price_product_detail');
            $table->integer('price_product_detail');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('fabric_id');
            $table->longText('description')->nullable();
            $table->integer('quantity');
            $table->longText('note')->nullable();
            $table->string('slug');
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('update_date')->useCurrent()->useCurrentOnUpdate();
            $table->string('status');

            $table->timestamps();

            // Indexes
            $table->index('category_id');
            $table->index('product_id');
            $table->index('color_id');
            $table->index('size_id');
            $table->index('fabric_id');

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('fabric_id')->references('id')->on('fabrics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
