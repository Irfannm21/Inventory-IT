<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerbaikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->morphs('hardwareable');
            $table->string("kerusakan");
            $table->string("tindakan");
            $table->time("stop")->nullable(); // Opsional
            $table->time("mulai")->nullable(); // Opsional
            $table->time("total")->nullable(); // Opsional
            $table->unsignedBigInteger('detail_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('petugas')->nullable(); // Opsional
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('detail_bons');
        });
    }


    public function down()
    {
        Schema::dropIfExists('perbaikans');
    }
}
