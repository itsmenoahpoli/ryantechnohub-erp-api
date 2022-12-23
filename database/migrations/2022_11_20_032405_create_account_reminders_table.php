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
        Schema::create('account_reminders', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['receivables', 'payables', 'monthly-expenses']);
            $table->string('title');
            $table->float('amount', 8, 2);
            $table->text('remarks')->nullable();
            $table->date('reminder_date');
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
        Schema::dropIfExists('account_reminders');
    }
};
