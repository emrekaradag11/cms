<?php

namespace Database\Seeders;

use App\Models\settings;
use Illuminate\Database\Seeder;

class settingsSeeder extends Seeder
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
                "name" => "title",
                "status_id" => "1"
            ],
            [
                "name" => "keywords",
                "status_id" => "1"
            ],
            [
                "name" => "description",
                "status_id" => "1"
            ],
            [
                "name" => "default_lang",
                "status_id" => "1"
            ],
            [
                "name" => "landing",
                "status_id" => "1"
            ],
            [
                "name" => "facebook",
                "status_id" => "1"
            ],
            [
                "name" => "twitter",
                "status_id" => "1"
            ],
            [
                "name" => "instagram",
                "status_id" => "1"
            ],
            [
                "name" => "linkedin",
                "status_id" => "1"
            ],
            [
                "name" => "youtube",
                "status_id" => "1"
            ],
            [
                "name" => "tiktok",
                "status_id" => "1"
            ],
            [
                "name" => "pinterest",
                "status_id" => "1"
            ],
            [
                "name" => "telegram",
                "status_id" => "1"
            ],
            [
                "name" => "medium",
                "status_id" => "1"
            ],
        ];

        foreach($data as $d){
            settings::create($d);
        }
    }
}
