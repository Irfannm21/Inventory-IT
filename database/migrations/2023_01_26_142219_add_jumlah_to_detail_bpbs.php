<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJumlahToDetailBpbs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_bpbs', function (Blueprint $table) {
            $table->integer('jumlah')->nullable()->after("detail_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_bpbs', function (Blueprint $table) {
            $table->dropColumn('jumlah');
        });
    }
}
