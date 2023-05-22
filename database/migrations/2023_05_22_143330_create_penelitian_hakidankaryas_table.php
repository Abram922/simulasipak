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
        Schema::create('penelitian_hakidankaryas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kum')->unsigned();
            $table->integer('id_semester')->unsigned();
            $table->integer('id_jeniskarya')->unsigned();
            $table->string('judul')->nullable();
            $table->double('jumlah_angka_kredit');
            $table->string('bukti')->nullable();
            $table->timestamps();
            $table->foreign('id_kum')->references('id')->on('kums')->onDelete('cascade');
            $table->foreign('id_semester')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('id_jeniskarya')->references('id')->on('komponen_penelitians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitian_hakidankaryas');
    }
};
