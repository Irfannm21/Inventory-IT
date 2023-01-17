<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_spareparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barang_id')->constrained()->onDelete('barang_id');
            $table->morphs('stockable');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->timestamps();


            $table->foreign('barang_id')->references('id')->on('daftar_barangs');
        });
    }


    public function down()
    {
        Schema::dropIfExists('stock_spareparts');
    }
}
