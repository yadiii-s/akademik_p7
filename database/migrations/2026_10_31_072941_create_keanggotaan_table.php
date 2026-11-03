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
        Schema::create('keanggotaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->foreignId('ukm_id')->constrained('ukm')->cascadeOnDelete();
            $table->string('jabatan', 30)->default('anggota');
            $table->date('bergabung_pada');
            $table->timestamps();
            $table->unique(['mahasiswa_id', 'ukm_id'], 'keanggotaan_mhs_ukm_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keanggotaan');
    }
};
