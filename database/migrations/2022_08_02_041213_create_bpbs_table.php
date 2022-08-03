<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->unsignedBigInteger('detail_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->BigInteger('harga');
            $table->string('supplier');
            $table->timestamps();


            $table->foreign('detail_id')->references('id')->on('detail_npps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpbs');
    }
}
