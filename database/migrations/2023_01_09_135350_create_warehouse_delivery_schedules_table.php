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
        Schema::create('warehouse_delivery_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_no')->unique();
            $table->string('ship_from_name');
            $table->string('ship_from_address');
            $table->string('ship_from_landline_no')->nullable();
            $table->string('ship_from_phone_no')->nullable();
            $table->string('ship_from_fax_no')->nullable();
            $table->string('ship_to_name');
            $table->string('ship_to_address');
            $table->string('ship_to_landline_no')->nullable();
            $table->string('ship_to_phone_no')->nullable();
            $table->string('ship_to_fax_no')->nullable();
            $table->json('items');
            $table->string('shipping_method');
            $table->enum('status', ['pending', 'preparing', 'in-transit', 'arrived', 'delivered', 'failed']);
            $table->dateTime('delivery_date');
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
        Schema::dropIfExists('warehouse_delivery_schedules');
    }
};
