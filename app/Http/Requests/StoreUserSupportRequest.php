<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserSupportRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'description'=> 'required',
            'user_id'   =>'required|integer',
            'image1'=>'nullable|mimes:jpeg,jpg,png',
            'image2'=>'nullable|mimes:jpeg,jpg,png',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 422,
            'meaasge' => "The given data was invalid to process with",
            'errors' => $validator->errors()
        ], 422));
    }

}
