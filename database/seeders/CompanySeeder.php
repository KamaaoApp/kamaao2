<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            ['legal_name'=> 'Google LLC', 'popular_name'=>'Google', 'url'=> 'https://google.com', 'logo'=> 'assets/images/company/P3wJgIvzFo48IgKyj4mjOWK8i9gHPf_1669290888.jpg', 'about'=>'Google LLC is an American multinational technology company focusing on search engine technology, online advertising, cloud computing, computer software, quantum computing, e-commerce, artificial intelligence, and consumer electronics.'],
            ['legal_name'=> 'Swiggy Foods', 'popular_name'=>'Swiggy', 'url'=> 'https://Swiggy.com', 'logo'=> 'assets/assets/images/company/yRzthywwYUbAWMuXTQg2PiEOM7gdrM_1669355800.png', 'about'=>'Swiggy is an Indian online food ordering and delivery platform. Founded in July 2014, Swiggy is based in Bangalore and operates in 500 Indian cities as of September 2021.[4][5] Besides food delivery, Swiggy also provides on-demand grocery deliveries under the name Instamart, and a same-day package delivery service called Swiggy Genie.']
        ];
        DB::table('companies')->insert($companies);
    }
}
