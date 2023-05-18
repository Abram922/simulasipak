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
        Schema::create('pelaksanaan_pendidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kum_id')->unsigned();
            $table->integer('idjenispelaksanaan')->unsigned()->nullable();
            $table->integer('semester_id')->unsigned();
            $table->string('nama_kegiatan')->nullable();
            $table->string('tempat_instansi')->nullable();
            $table->string('bukti')->nullable();
            $table->integer('jumlah_angka_kredit')->nullable();
            $table->timestamps();
            $table->foreign('kum_id')->references('id')->on('kums')->onDelete('cascade');
            $table->foreign('idjenispelaksanaan')->references('id')->on('jenis_pelaksanan_pendidikans')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaksanaan_pendidikans');
    }
};
