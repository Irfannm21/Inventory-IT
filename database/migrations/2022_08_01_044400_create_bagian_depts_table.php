<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagianDeptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagian_depts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kabag')->nullable();
            $table->unsignedBigInteger('departemen_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->foreign('departemen_id')->references('id')->on('departemens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bagian_depts');
    }
}
