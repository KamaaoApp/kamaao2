<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCompanyRequest extends FormRequest
{

    /**
        * Indicates if the validator should stop on the first rule failure.
        * @var bool
    */
    protected $stopOnFirstFailure = true;
    
    /**
        * Determine if the user is authorized to make this request.
        * @return bool
    */
    public function authorize()
    {
        $user = auth('sanctum')->user();
        if($user)
        {
            if(auth('sanctum')->user()->can('Company-create'))
            {
                return true;
            }
        }
        return false;
    }

    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'legal_name'=>'required|unique:companies,legal_name|min:3',
            'popular_name'=>'required',
            'url'=>'required|url',
            'logo'=>'required|mimes:jpeg,jpg,png',
            'about'=>'required',
        ];
    }
   
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => "FAILED",
            'status_code' => 422,
            'meaasge' => "The given data was invalid to process with",
            // 'errors' => ['message'=> 'Validation Error'],
            'errors' => $validator->errors()
        ], 422));
    }


}
