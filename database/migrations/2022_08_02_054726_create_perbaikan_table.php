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
            $table->unsignedBigInteger('bpb_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('keterangan');
            $table->morphs('hardwareable');
            $table->timestamps();


            $table->foreign('bpb_id')->references('id')->on('bpbs');
        });
    }


    public function down()
    {
        Schema::dropIfExists('perbaikans');
    }
}
