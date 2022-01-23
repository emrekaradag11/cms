<?php

namespace Database\Seeders;

use App\Models\plugin;
use Illuminate\Database\Seeder;

class pluginSeeder extends Seeder
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
                "name" => "Whatsapp",
                "status_id" => "1"
            ],
            [
                "name" => "Tawk.to",
                "status_id" => "1"
            ],
            [
                "name" => "Facebook Pixel",
                "status_id" => "1"
            ],
            [
                "name" => "Google Analytics",
                "status_id" => "1"
            ],
            [
                "name" => "Appzi Feeback",
                "status_id" => "1"
            ],
            [
                "name" => "Disqus",
                "status_id" => "1"
            ], 
        ];

        foreach($data as $d){
            plugin::create($d);
        }
    }
}
