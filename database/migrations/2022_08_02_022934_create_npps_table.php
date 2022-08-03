<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->date('tanggal');
            $table->unsignedBigInteger('departemen_id');
            $table->unsignedBigInteger('bagian_id');
            $table->timestamps();

            $table->foreign('departemen_id')->references('id')->on('departemens');
            $table->foreign('bagian_id')->references('id')->on('departemens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('npps');
    }
}
