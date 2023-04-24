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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('strata_id')->unsigned();
            $table->integer('kum_id')->unsigned();
            $table->date('tanggal');
            $table->string('institusi');
            $table->string('bukti');
            $table->timestamps();

            $table->foreign('strata_id')->references('id')->on('stratapendidikans')->onDelete('cascade');
            $table->foreign('kum_id')->references('id')->on('kums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};
