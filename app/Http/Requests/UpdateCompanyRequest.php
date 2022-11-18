<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCompanyRequest extends FormRequest
{
     /**
        * Indicates if the validator should stop on the first rule failure.
        *
        * @var bool
    */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth('sanctum')->user();
        if($user)
        {
            return auth('sanctum')->user()->can('Company-edit');
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
            'company_legal_name'=>'required|min:3|unique:companies,company_legal_name,'.$this->route('company')->id,
            'company_popular_name'=>'required|min:3',
            'company_popular_name'=>'required',
            'company_url'=>'required|url',
            'company_logo'=>'nullable|mimes:jpeg,jpg,png',
            'about_company'=>'required|nullable',
        ];
    }

    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 422,
            'meaasge' => "The given data was invalid to process with",
            // 'errors' => ['message'=> 'Validation Error'],
            'errors' => $validator->errors()

        ], 422));
    }
}
