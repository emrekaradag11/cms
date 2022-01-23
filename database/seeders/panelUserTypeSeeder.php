<?php

namespace Database\Seeders;

use App\Models\panel_user_types;
use Illuminate\Database\Seeder;

class panelUserTypeSeeder extends Seeder
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
                "name"=>"Süper Admin"
            ],[
                "name"=>"Admin"
            ],[
                "name"=>"Alt Kullanıcı"
            ]
        ];

        foreach($data as $d){
            panel_user_types::create($d);
        }
    }
}
