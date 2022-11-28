<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateTasksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            //
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
    public function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status_code' => '403',
            'status' => 'Failed',
            'message' => 'This Request is not allowed. Or read exception',
            'exception' => 'This action requires more permissions'
        ], 403));
    }
}
