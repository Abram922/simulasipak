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
            $table->integer('id_kum')->unsigned()->nullable();
            $table->integer('id_semester')->unsigned()->nullable();
            $table->string('kode_matakuliah')->nullable();
            $table->string('matakuliah')->nullable();
            $table->string('instansi')->nullable();
            $table->string('sks_pengajaran')->nullable();
            $table->double('jumlah_angka_kredit')->nullable();
            $table->string('nama_kelas_pengajaran')->nullable();
            $table->integer('volume_dosen_pengajar')->nullable();
            $table->string('file')->nullable();
            $table->string('inisial_dosen')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('dosen1')->unsigned()->nullable();
            $table->integer('dosen2')->unsigned()->nullable();
            $table->integer('dosen3')->unsigned()->nullable();
            $table->string('dosen_1')->nullable();
            $table->string('dosen_2')->nullable();
            $table->string('dosen_3')->nullable();
            $table->string('sk')->nullable();
            $table->integer('clone')->nullable();
            $table->timestamps();
            
            $table->foreign('dosen1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dosen2')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dosen3')->references('id')->on('users')->onDelete('cascade');
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
