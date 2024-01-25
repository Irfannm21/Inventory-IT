<?php

use App\Models\hrd\departemen;
use Illuminate\Database\Seeder;

class DepartementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept = [
            [
               "id" => "1",
               "nama" => "Directors",
            ],
            [
                "id" => "2",
                "nama" => "Marketing",
             ],
             [
                "id" => "3",
                "nama" => "Accounting",
             ],
             [
                "id" => "4",
                "nama" => "Logistics",
             ],
             [
                "id" => "5",
                "nama" => "Umpers dan Personalia",
             ],
             [
                "id" => "6",
                "nama" => "Dyeing Finishing",
             ],
             [
                "id" => "7",
                "nama" => "Engineering",
             ],
             [
                "id" => "8",
                "nama" => "Weaving",
             ],
             [
                "id" => "9",
                "nama" => "Spinning",
             ],
            ];

            departemen::insert($dept);


    }
}
