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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role')->unsigned()->default(2);
            $table->integer('pangkat')->unsigned();
            $table->integer('jabatan_fungsional')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('NIDN')->nullable();
            $table->string('ikatan_kerja')->nullable();
            $table->string('institusi')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('pangkat')->references('id')->on('pangkats')->onDelete('cascade');
            $table->foreign('jabatan_fungsional')->references('id')->on('jabatans')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
