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
        Schema::create('pelaksanan_penelitians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kum_id')->unsigned();
            $table->integer('akreditasi_id')->unsigned();
            $table->integer('jenispenulis_id')->unsigned();
            $table->string('judul');
            $table->string('jurnal');
            $table->string('link');
            $table->integer('jumlah_penulis')->nullable();
            $table->integer('author_persentase')->nullable();
            $table->double('angkakredit');
            $table->date('tanggal');
            $table->foreign('kum_id')->references('id')->on('kums')->onDelete('cascade');
            $table->foreign('akreditasi_id')->references('id')->on('akreditasi_penelitians')->onDelete('cascade');
            $table->foreign('jenispenulis_id')->references('id')->on('penulis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaksanan_penelitians');
    }
};
