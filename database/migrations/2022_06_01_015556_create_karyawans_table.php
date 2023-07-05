<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->char('nik',4)->unique();
            $table->string('ektp');
            $table->string('no_kk');
            $table->string('npwp');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->char('jenis_kelamin',2);
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('alamat_ktp');
            $table->string('alamat_domisili');
            $table->string('no_hp');
            $table->string('email');
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->string('gol_darah');
            $table->string('##############');
            $table->string('jabatan########');
            $table->string('tmk');
            $table->string('shift');
            $table->string('serikat_pekerja');
            $table->string('photo');


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
        Schema::dropIfExists('karyawans');
    }
}
