<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documents = [
            ['id'=>1, 'document_title'=> 'PAN CARD'],
            ['id'=>2, 'document_title'=> 'AADHAR CARD'],
            ['id'=>3, 'document_title'=> 'VOTER CARD'],
            ['id'=>4, 'document_title'=> 'DRIVING LICENSE(DL)'],
            ['id'=>5, 'document_title'=> 'VEHICLE REGISTRATION CERTIFICATE(RC)']
        ];
        DB::table('document_types')->insert($documents);
    }
}
