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
        Schema::create('komponenpms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('komponenkegiatan')->nullable();
            $table->integer('angkakredit')->nullable();
            $table->string('bukti_kegiatan');
            $table->string('batas_maksimal_diakui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponenpms');
    }
};
