<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik')->unique();
            $table->unsignedBigInteger('bagian_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('status_perkawinan');
            $table->string('asal_provinsi');
            $table->string('asal_kota_kabupaten');
            $table->string('asal_kecamatan');
            $table->string('alamat_detail');
            $table->string('nomor_hp');
            $table->string('email');
            $table->string('file')->default('default_profile.jpg');
            $table->tinyInteger('background_profil')->default(1);

            $table->timestamps();

            $table->foreign('bagian_id')->references('id')->on('bagian_depts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lamarans');
    }
}
