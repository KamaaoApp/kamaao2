<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $modules = [
            ['id'=>1, 'title'=>'Role'],
            ['id'=>2, 'skill'=>'Company'],
            // 'Company',
            // 'Job',
            // 'Job-Cats',
            // 'Application',
            // 'Employees',
            // 'Project',
            // 'Task',
            // 'Product',
            // 'Product-category',
            // 'Product-sub-category',
            // 'Hot-Offer',
            // 'University',
            // 'Support',
         ];
      
        DB::table('app_modules')->insert($modules);
    }
}
