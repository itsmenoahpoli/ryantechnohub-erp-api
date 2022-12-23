<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('barcode_no')->unique();
            $table->string('serial_no')->unique();
            $table->string('name');
            $table->string('model');
            $table->string('name_slug')->unique();
            $table->float('price', 8, 2);
            $table->float('sale_price', 8, 2);
            $table->text('description');
            $table->bigInteger('stocks')->nullable();
            $table->boolean('is_tracked_stocks')->default(0);
            $table->boolean('is_onsale')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_posted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
