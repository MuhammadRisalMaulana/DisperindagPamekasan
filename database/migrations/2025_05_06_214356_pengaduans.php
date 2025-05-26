<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengaduans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('user_alamat');
            $table->string('phone');
            $table->string('description');
            $table->text('lokasi_kejadian');
            $table->text('keterangan_tambahan')->nullable();
            $table->string('image');
            $table->enum('status', ['belum diproses', 'diproses', 'selesai'])->default('belum diproses');
            $table->string('token', 6)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
