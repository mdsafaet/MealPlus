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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('short_des', 300);
            $table->string('price');
            $table->boolean('discount');
            $table->string('discount_price');
            $table->string('image');
            $table->boolean('stock');
            $table->float(column: 'star');
            $table->enum('remark', ['new','popular','trending','top','special','regular']);

            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('brand_id');
            // $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete('cascade');
            // $table->foreign('brand_id')->references('id')->on('brands')->restrictOnDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

          $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->cascadeOnUpdate()
                ->restrictOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
