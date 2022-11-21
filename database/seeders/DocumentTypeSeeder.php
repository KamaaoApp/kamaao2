<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

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
            'PAN CARD',
            'AADHAR CARD',
            'VOTER CARD',
            'DRIVING LICENSE(DL)',
            'VEHICLE REGISTRATION CERTIFICATE(RC)'
         ];
      
        foreach ($documents as $document)
        {
            DocumentType::create(['document_title' =>$document]);
        }
    }
}
