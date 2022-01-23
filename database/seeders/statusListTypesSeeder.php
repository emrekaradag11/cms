<?php

namespace Database\Seeders;

use App\Models\status_list_types;
use Illuminate\Database\Seeder;

class statusListTypesSeeder extends Seeder
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
                "title"=>"Genel"
            ],[
                "title"=>"Ürünler"
            ],[
                "title"=>"Kategoriler"
            ],[
                "title"=>"Markalar"
            ],
        ];

        foreach($data as $d){
            status_list_types::create($d);
        }
    }
}
