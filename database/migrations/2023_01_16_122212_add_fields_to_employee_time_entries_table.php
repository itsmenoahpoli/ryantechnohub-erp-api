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
        Schema::table('employee_time_entries', function (Blueprint $table) {
            $table->foreignId('store_id')->after('id')->constrained('stores')->restrictOnDelete();
            $table->foreignId('store_pos_id')->after('store_id')->constrained('store_pos')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_time_entries', function (Blueprint $table) {
            $table->dropColumn(['store_id', 'store_pos_id']);
        });
    }
};
