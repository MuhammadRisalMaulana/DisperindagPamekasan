<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID admin/petugas
            $table->string('aksi');               // deskripsi aksi
            $table->enum('status',['Belum di Proses','Sedang di Proses','Selesai'])->default('Belum di Proses');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_aktivitas');
    }
}
