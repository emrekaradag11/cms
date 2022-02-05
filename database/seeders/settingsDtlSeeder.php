<?php

namespace Database\Seeders;

use App\Models\settings_dtl;
use Illuminate\Database\Seeder;

class settingsDtlSeeder extends Seeder
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
                "group_id" => "1",
                "option" => "example title",
                "lang" => "1",
            ],
            [
                "group_id" => "2",
                "option" => "example keywords",
                "lang" => "1",
            ],
            [
                "group_id" => "3",
                "option" => "example description",
                "lang" => "1",
            ],
            [
                "group_id" => "4",
                "option" => "1",
                "lang" => "1",
            ],
            [
                "group_id" => "5",
                "option" => "0",
                "lang" => "1",
            ],
            [
                "group_id" => "6",
                "option" => "//example facebook link",
                "lang" => "1",
            ],
            [
                "group_id" => "7",
                "option" => "//example twitter link",
                "lang" => "1",
            ],
            [
                "group_id" => "8",
                "option" => "//example instagram link",
                "lang" => "1",
            ],
            [
                "group_id" => "9",
                "option" => "//example linkedin link",
                "lang" => "1",
            ],
            [
                "group_id" => "10",
                "option" => "//example youtube link",
                "lang" => "1",
            ],
            [
                "group_id" => "11",
                "option" => "//example tiktok link",
                "lang" => "1",
            ],
            [
                "group_id" => "12",
                "option" => "//example pinterest link",
                "lang" => "1",
            ],
            [
                "group_id" => "13",
                "option" => "//example telegram link",
                "lang" => "1",
            ],
            [
                "group_id" => "14",
                "option" => "//example medium link",
                "lang" => "1",
            ],
        ];

        foreach($data as $d){
            settings_dtl::create($d);
        }
    }
}
