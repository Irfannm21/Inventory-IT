<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->text('kehadiran');
            $table->time('jam_masuk');
            $table->time('istirahat');
            $table->time('jam_keluar');
            $table->time('lembur');
            $table->time('kurang_jam_kerja');
            $table->unsignedBigInteger('karyawan_id');
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')->on('karyawans')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
