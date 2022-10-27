<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bpb_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('type')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('kota');
            $table->string('alamat')->nullable();
            $table->timestamps();


            $table->foreign('bpb_id')->references('id')->on('bpbs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
