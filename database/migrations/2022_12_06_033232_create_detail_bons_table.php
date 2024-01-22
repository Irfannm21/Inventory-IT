<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bon_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('barang_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('satuan');

            $table->string('keterangan')->nullable();
            $table->foreign('bon_id')->references('id')->on('bon_keluars');
            $table->foreign('barang_id')->references('id')->on('daftar_barangs');
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
        Schema::dropIfExists('detail_bons');
    }
}
