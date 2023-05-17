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
        Schema::create('pengajarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kum')->unsigned();
            $table->integer('id_semester')->unsigned();
            $table->string('kode_matakuliah')->nullable();            
            $table->string('matakuliah')->nullable();
            $table->string('instansi')->nullable();
            $table->string('sks_pengajaran')->nullable();
            $table->double('jumlah_angka_kredit');
            $table->string('nama_kelas_pengajaran')->nullable();
            $table->integer('volume_dosen_pengajar')->nullable();
            $table->timestamps();
            $table->foreign('id_kum')->references('id')->on('kums')->onDelete('cascade');
            $table->foreign('id_semester')->references('id')->on('semesters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajarans');
    }
};
