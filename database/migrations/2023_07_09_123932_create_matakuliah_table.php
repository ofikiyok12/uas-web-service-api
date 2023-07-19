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
        Schema::create('mt_kuliah', function (Blueprint $table) {
            $table->increments('id')-> unique();
            $table->string('nama_mk',50);
            $table->string('sks',10);
            $table->string('smester',10);
            $table->string('jumlah_mhs',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mt_kuliah');
    }
};
