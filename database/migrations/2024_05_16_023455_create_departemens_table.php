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
        Schema::create('departemens', function (Blueprint $table) {
            $table->id();
            //nama departemen
            $table->string('nama_departemen');
            //deskripsi departemen, boleh null
            $table->text('deskripsi')->nullable();
            //manager departemen, boleh null
            $table->string('manager')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departemens');
    }
};
