<?php

namespace Database\Seeders;

use App\Models\plugin_dtl;
use Illuminate\Database\Seeder;

class pluginDtlSeeder extends Seeder
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
                "plugin_id" => "1",
                "status_id" => "+905554443322"
            ], 
            [
                "plugin_id" => "1",
                "status_id" => "test mesajı"
            ], 
            [
                "plugin_id" => "1",
                "status_id" => "test popup"
            ], 
            [
                "plugin_id" => "2",
                "status_id" => "//tawtoscript"
            ], 
            [
                "plugin_id" => "3",
                "status_id" => "//fb script"
            ], 
            [
                "plugin_id" => "4",
                "status_id" => "//gtag script"
            ], 
            [
                "plugin_id" => "5",
                "status_id" => "//appzi script"
            ], 
            [
                "plugin_id" => "6",
                "status_id" => "//disqus script"
            ], 
        ];

        foreach($data as $d){
            plugin_dtl::create($d);
        }
    }
}
