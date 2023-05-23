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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('angkaKreditKumulatif');
            $table->integer('pelaksanaanPendidikan');
            $table->integer('pelaksanaanPenelitian');
            $table->integer('pelaksanaanPengabdianMasyarakat');
            $table->integer('penunjang');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};
