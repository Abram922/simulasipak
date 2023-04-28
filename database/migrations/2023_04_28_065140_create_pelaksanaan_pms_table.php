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
        Schema::create('pelaksanaan_pms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kum_id')->unsigned();
            $table->integer('komponenpm_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->string('nama')->nullable();
            $table->string('bentuk')->nullable();
            $table->string('tempat_instansi')->nullable();
            $table->string('angkakredit')->nullable();
            $table->string('buktifisik')->nullable();
            $table->timestamps();
            $table->foreign('kum_id')->references('id')->on('kums')->onDelete('cascade');
            $table->foreign('komponenpm_id')->references('id')->on('komponenpms')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaksanaan_pms');
    }
};
