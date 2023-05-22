<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailNppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_npps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('npp_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('stok')->nullable();
            $table->string('keterangan');
            $table->timestamps();


            $table->foreign('npp_id')->references('id')->on('npps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_npps');
    }
}
