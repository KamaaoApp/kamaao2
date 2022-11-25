<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['id'=>1, 'skill'=>'skill 1'],
            ['id'=>2, 'skill'=>'skill 2'],
            ['id'=>3, 'skill'=>'skill 3'],
            ['id'=>4, 'skill'=>'skill 4'],
        ];
      
        DB::table('skills')->insert($skills);
    }
}
