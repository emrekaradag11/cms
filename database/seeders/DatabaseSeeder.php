<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            statusListSeeder::class,
            statusListTypesSeeder::class,
            panelUserSeeder::class,
            panelUserTypeSeeder::class,
            langSeeder::class,
            pluginSeeder::class,
            pluginDtlSeeder::class,
            settingsSeeder::class,
            settingsDtlSeeder::class,
        ]);
    }
}
