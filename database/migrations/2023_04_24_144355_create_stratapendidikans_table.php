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
        Schema::create('stratapendidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('strata');
            $table->integer('nilai');
            $table->string('keterangan');
            $table->string('batas_maksimal_diakui');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stratapendidikans');
    }
};
