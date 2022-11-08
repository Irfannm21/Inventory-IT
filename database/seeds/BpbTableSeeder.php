<?php

use App\bpb;
use App\npp;
use App\supplier;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BpbTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::Create('id_ID');
        $npp = npp::find(2);
        $supplier = supplier::where("id",2)->first();

        $bpb = new bpb;
        $bpb->kode = "01/BPB.ADM/X/2022";
        $bpb->kelompok = "Administrasi";
        $bpb->tanggal = "2022-10-01";
        $bpb->npp()->associate($npp);
        $bpb->supplier()->associate($supplier);
        $bpb->save();


    }
}
