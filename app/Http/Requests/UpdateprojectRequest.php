<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateprojectRequest extends FormRequest
{
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
            'title'=>'required|min:3',
            'sub_title'=>'required|min:3',
            'type'=>'required',
            'category'=>'required',
            'company_id'=>'required',
            'start_date'=> 'required|date|date_format:Y-m-d|after_or_equal:today',
            'end_date'=> 'required|date|date_format:Y-m-d|after:start_date',
            'total_openings'=>'required|integer',
            'amount' => 'required|integer',
            'area' =>'required',
            'city'  =>'required',
            'city_id'  =>'required|integer',
            'state'  =>'required',
            'state_id'  =>'required|integer',
            'term_conditions'=>'required',
            'description_video'=> 'required|url',
            
            'roles_responsibility'=>'required',
            'cta1'=>'required',
            'cta1_text'=>'required',
            'cta2'=>'required',
            'cta2_text'=>'required',
            'min_education'=> 'required',
            'experience_required'=>'required',
            'skills_required'   =>'required',
            'documents_required'=>'nullable',
            'additional_requirement'=>'nullable|string',
            'opening_left'=>'nullable'
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
