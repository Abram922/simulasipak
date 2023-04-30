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
        Schema::create('dokumenpenunjangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kum_id')->unsigned();
            $table->integer('komponenpenunjang_id')->unsigned();
            $table->string('namakegiatan_dp');
            $table->date('tanggal_pelaksanaan_dp');
            $table->string('instansi_dp');
            $table->integer('angkakredit_dp')->nullable();
            $table->string('kedudukan_dp');
            $table->string('buktidp');

            $table->foreign('kum_id')->references('id')->on('kums')->onDelete('cascade');
            $table->foreign('komponenpenunjang_id')->references('id')->on('komponendokumenpenunjangs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumenpenunjangs');
    }
};
