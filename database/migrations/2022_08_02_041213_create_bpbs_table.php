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
            $table->unsignedBigInteger('npp_id')->constrained()->onDelete('cascade');
            $table->string('kode');
            $table->string('kelompok');
            $table->date('tanggal');
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
        Schema::dropIfExists('bpbs');
    }
}
