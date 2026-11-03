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
        Schema::create('ukm', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique();
            $table->string('nama', 100);
            $table->string('kategori', 30);
            $table->unsignedSmallInteger('tahun_berdiri');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ukm');
    }
};
