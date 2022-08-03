<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKliensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kliens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('karyawan_id')->unique();
            $table->unsignedBigInteger('printer_id')->unique();
            $table->unsignedBigInteger('komputer_id')->unique();
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')->on('master_karyawans');
            $table->foreign('printer_id')->references('id')->on('printers');
            $table->foreign('komputer_id')->references('id')->on('komputers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kliens');
    }
}
