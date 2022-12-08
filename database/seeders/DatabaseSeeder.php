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
        // \App\Models\User::factory(2)->create();
        $this->call([
            ModulesSeeder::class,
            PermissionSeeder::class,
            DocumentTypeSeeder::class,
            SkillsSeeder::class,
            StateSeeder::class,
            DistrictSeeder::class,
            CitySeeder::class,
            CompanySeeder::class
        ]);
    }
}
