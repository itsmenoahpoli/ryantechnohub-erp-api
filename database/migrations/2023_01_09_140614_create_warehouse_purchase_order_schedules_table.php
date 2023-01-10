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
        Schema::create('warehouse_purchase_order_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('puchase_order_no')->unique();
            $table->string('vendor_company_name');
            $table->string('vendor_company_email')->nullable();
            $table->string('vendor_address');
            $table->string('vendor_landline_no')->nullable();
            $table->string('vendor_phone_no')->nullable();
            $table->string('vendor_fax_no')->nullable();
            $table->string('ship_to_name');
            $table->string('ship_to_address');
            $table->string('ship_to_landline_no')->nullable();
            $table->string('ship_to_phone_no')->nullable();
            $table->string('ship_to_fax_no')->nullable();
            $table->json('items');
            $table->string('shipping_method');
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
        Schema::dropIfExists('warehouse_purchase_order_schedules');
    }
};
