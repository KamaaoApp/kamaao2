<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateskillsRequest extends FormRequest
{
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
            auth('sanctum')->user()->can('Company-create');
            return true;
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
            'skill'=>'required|min:3|unique:companies,company_legal_name,'.$this->route('skills')->id,
            
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
