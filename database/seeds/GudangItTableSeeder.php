<?php

use Illuminate\Database\Seeder;

use App\Models\it\komputer;
use App\Models\it\gudangIT;
class GudangItTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $printer_val = komputer::findOrFail('1')->first();

        $gudang_val = new gudangIT;
        $gudang_val->tanggal = "2023-11-12";
        $gudang_val->keterangan = "Motherboard Rusak";

        $printer_val->gudangitable()->save($gudang_val);

    }
}
