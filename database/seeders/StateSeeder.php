<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
                    ['id'=>1, 'state'=> 'Andaman & Nicobar Islands', 'status'=>'1'],
                    ['id'=>2, 'state'=> 'Andhra Pradesh', 'status'=>'1'],
                    ['id'=>3, 'state'=> 'Arunachal Pradesh', 'status'=>'1'],
                    ['id'=>4, 'state'=> 'Assam', 'status'=>'1'],
                    ['id'=>5, 'state'=> 'Bihar', 'status'=>'1'],
                    ['id'=>6, 'state'=> 'Chandigarh', 'status'=>'1'],
                    ['id'=>7, 'state'=> 'Chhattisgarh', 'status'=>'1'],
                    ['id'=>8, 'state'=> 'Dadra & Nagar Haveli', 'status'=>'1'],
                    ['id'=>9, 'state'=> 'Daman & Diu', 'status'=>'1'],
                    ['id'=>10, 'state'=> 'Delhi', 'status'=>'1'],
                    ['id'=>11, 'state'=> 'Goa', 'status'=>'1'],
                    ['id'=>12, 'state'=> 'Gujarat', 'status'=>'1'],
                    ['id'=>13, 'state'=> 'Haryana', 'status'=>'1'],
                    ['id'=>14, 'state'=> 'Himachal Pradesh', 'status'=>'1'],
                    ['id'=>15, 'state'=> 'Jammu & Kashmir', 'status'=>'1'],
                    ['id'=>16, 'state'=> 'Jharkhand', 'status'=>'1'],
                    ['id'=>17, 'state'=> 'Karnataka', 'status'=>'1'],
                    ['id'=>18, 'state'=> 'Kerala', 'status'=>'1'],
                    ['id'=>19, 'state'=> 'Lakshadweep', 'status'=>'1'],
                    ['id'=>20, 'state'=> 'Madhya Pradesh', 'status'=>'1'],
                    ['id'=>21, 'state'=> 'Maharashtra', 'status'=>'1'],
                    ['id'=>22, 'state'=> 'Manipur', 'status'=>'1'],
                    ['id'=>23, 'state'=> 'Meghalaya', 'status'=>'1'],
                    ['id'=>24, 'state'=> 'Mizoram', 'status'=>'1'],
                    ['id'=>25, 'state'=> 'Nagaland', 'status'=>'1'],
                    ['id'=>26, 'state'=> 'Odisha', 'status'=>'1'],
                    ['id'=>27, 'state'=> 'Puducherry', 'status'=>'1'],
                    ['id'=>28, 'state'=> 'Punjab', 'status'=>'1'],
                    ['id'=>29, 'state'=> 'Rajasthan', 'status'=>'1'],
                    ['id'=>30, 'state'=> 'Sikkim', 'status'=>'1'],
                    ['id'=>31, 'state'=> 'Tamil Nadu', 'status'=>'1'],
                    ['id'=>32, 'state'=> 'Tripura', 'status'=>'1'],
                    ['id'=>33, 'state'=> 'Uttar Pradesh', 'status'=>'1'],
                    ['id'=>34, 'state'=> 'Uttarakhand', 'status'=>'1'],
                    ['id'=>35, 'state'=> 'West Bengal', 'status'=>'1'],
                ];
        DB::table('states')->insert($states);
    }
}
