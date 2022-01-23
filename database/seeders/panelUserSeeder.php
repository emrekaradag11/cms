<?php

namespace Database\Seeders;

use App\Models\panel_users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class panelUserSeeder extends Seeder
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
                "name" => "super",
                "surname" => "Admin",
                "type_id" => "1",
                "password" => Hash::make("demo"),
                "email" => "demo@demo.com",
            ],
        ];

        foreach($data as $d){
            panel_users::create($d);
        }
    }
}
