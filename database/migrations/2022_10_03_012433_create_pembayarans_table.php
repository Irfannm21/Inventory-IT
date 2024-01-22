<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detail_id')->constrained()->onDelete('cascade');
            $table->bigInteger('rupiah')->nullable();
            $table->bigInteger('dollar')->nullable();
            $table->bigInteger('ppn');
            $table->bigInteger('total_harga');
            $table->string('jenis_pembayaran');
            $table->string('lama_kredit')->nullable();
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('Detail_bpbs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}
