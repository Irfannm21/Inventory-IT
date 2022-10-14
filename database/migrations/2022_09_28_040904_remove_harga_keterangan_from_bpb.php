<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveHargaKeteranganFromBpb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bpbs', function (Blueprint $table) {
            $table->dropColumn(["harga"],["keterangan"]);
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
            $table->string('harga','bpbs');
        });
    }
}
