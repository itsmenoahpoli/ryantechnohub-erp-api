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
        Schema::create('archive_file_documents', function (Blueprint $table) {
            $table->id();
            $table->string('file_no')->unique();
            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_size');
            $table->string('file_for');
            $table->string('url');
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
        Schema::dropIfExists('file_documents');
    }
};
