<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdNppToBpbs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bpbs', function (Blueprint $table) {
            $table->unsignedBigInteger('npp_id')->constrained()->onDelete('cascade')->after('kode');

            $table->foreign("npp_id")->references('id')->on('npps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bpbs', function (Blueprint $table) {
            $table->unsignedBigInteger('npp_id')->constrained()->onDelete('cascade')->after('kode');

            $table->foreign("npp_id")->references('id')->on('npps');
        });
    }
}
