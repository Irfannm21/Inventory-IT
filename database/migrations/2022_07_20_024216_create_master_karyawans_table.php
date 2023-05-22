<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode',4)->unique();
            $table->string('id_finger');
            $table->string('nik');
            $table->string('nama');
            $table->string('ektp');
            $table->string('no_kpj');
            $table->string('no_npwp');
            $table->string('no_kk');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->char('jenis_kelamin',2);
            $table->string('status_perkawinan');
            $table->string('alamat');
            $table->string('alamat_baru');
            $table->string('no_telepon');
            $table->string('no_hp');
            $table->string('email');
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->string('pengupahan');
            $table->string('gol_darah');
            $table->string('bagian');
            $table->string('departemen');
            $table->string('jabatan');
            $table->string('tmk');
            $table->string('shift');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('serikat_pekerja');
            $table->string('status_pegawai');
            $table->string('catatan');
            $table->string('photo');
            $table->date('tanggal_kontrak');
            $table->date('habis_kontrak');
            $table->string('no_vaklaring');
            $table->string('alasan_keluar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_karyawans');
    }
}
