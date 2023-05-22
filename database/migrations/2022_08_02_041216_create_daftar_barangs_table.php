<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('nomor_part')->nullable();
            $table->string('no_kartu')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('jenis')->nullable();
            $table->string('satuan')->nullable();
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
        Schema::dropIfExists('daftar_barangs');
    }
}
