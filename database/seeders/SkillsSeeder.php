<?php

namespace Database\Seeders;

use App\Models\skills;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $skills = [
            'skill 1',
            'skill 2',
            'skill 3',
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
      
        foreach ($skills as $skill)
        {
            skills::create(['skill' =>$skill]);
        }
    }
}
