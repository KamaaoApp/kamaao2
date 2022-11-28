<?php 
namespace App\Http\Traits;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
 
trait ImageUpload
{
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
 
        $file = $uploadedFile->move($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
 
        return $file;
    }
}