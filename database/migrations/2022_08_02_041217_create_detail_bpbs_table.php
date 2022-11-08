<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBpbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bpbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bpb_id')->constrained()->onDelete('bpb_id');
            $table->unsignedBigInteger('detail_id')->constrained()->onDelete('detail_id');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->timestamps();

            $table->foreign('bpb_id')->references('id')->on('bpbs');
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
        Schema::dropIfExists('detail_bpbs');
    }
}
