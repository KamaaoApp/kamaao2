<?php

namespace Database\Seeders;

use App\Models\AppModules;
use Illuminate\Database\Seeder;

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
            'Role',
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
      
        foreach ($modules as $module)
        {
            AppModules::create(['title' =>$module]);
        }
    }
}
