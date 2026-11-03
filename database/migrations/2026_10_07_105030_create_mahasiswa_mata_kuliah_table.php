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
        Schema::create('mahasiswa_mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliah')->cascadeOnDelete();
            $table->string('semester', 12);
            $table->decimal('nilai', 5, 2)->nullable();
            $table->timestamps();

            $table->unique([
                'mahasiswa_id',
                'mata_kuliah_id',
                'semester'
            ], 'mhs_mk_smt_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_mata_kuliah');
    }
};
