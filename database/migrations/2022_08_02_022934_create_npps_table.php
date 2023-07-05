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
            $table->date('status')->nullable();
            $table->unsignedBigInteger('bagian_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->foreign('bagian_id')->references('id')->on('bagian_depts');
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
