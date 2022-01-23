<?php

namespace Database\Seeders;

use App\Models\lang;
use Illuminate\Database\Seeder;

class langSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "lang" => "Türkçe",
                "lang_short" => "tr", 
            ],
        ];

        foreach($data as $d){
            lang::create($d);
        }
    }
}
