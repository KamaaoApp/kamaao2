<?php

namespace Database\Seeders;

use App\Models\AppModules;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules =  AppModules::select('title')->get();
        foreach($modules as $module)
        {
            Permission::create(
                ['guard_name' => 'sanctum','name' => $module->title.'-create'] 
            );
            Permission::create(
                ['guard_name' => 'sanctum','name' => $module->title.'-list']
            );
            Permission::create(
                
                ['guard_name' => 'sanctum','name' => $module->title.'-edit'],
            );
            Permission::create(
                ['guard_name' => 'sanctum','name' => $module->title.'-delete']
            );
        }
        User::create( [ 
            "name"=> "Gyaanesh Chandra",
            "email"=>'gyaanesh@gmail.com',
            "password"=>Hash::make('@Gyaanesh1on1'),
            "user_type"=>"Super Admin",
            "enc_pass"=>123456789,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
       
        
        $role = Role::create(['guard_name' => 'sanctum', 'name' => 'Super Admin']);
        
        $role->givePermissionTo(Permission::all());
    }
}
