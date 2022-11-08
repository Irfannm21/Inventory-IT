<?php

use Illuminate\Database\Seeder;
use App\bpb;
use App\detail_npp;
use App\Detail_bpb;
class DetailBpbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bpb = bpb::find(1);
        $detail = detail_npp::find(1);

        $detail_bpb = new Detail_bpb;
        $detail_bpb->bpb()->associate($bpb);
        $detail_bpb->detail_npp()->associate($detail);
        $detail_bpb->jumlah = 1;
        $detail_bpb->satuan = "Unit";
        $detail_bpb->save();
    }
}
