<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komputers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('system');
            $table->string('nomor_ip');
            $table->string('motherboard');
            $table->string('processor');
            $table->string('powersupply');
            $table->string('ram');
            $table->string('disk');
            $table->string('vga')->nullable();
            $table->string('split');
            $table->string('monitor1');
            $table->string('monitor2')->nullable();
            $table->timestamps();
        });
    }

    //

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komputers');
    }
}
