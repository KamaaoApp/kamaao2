<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreJobRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    { 
        return auth('sanctum')->user()->can('Jobs-create');
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
            'last_date'=> 'required|date|date_format:Y-m-d|after:today',
            'total_openings'=>'required|integer',
            'min_salary' => 'required|integer',
            'max_salary' => 'required|integer|gt:min_salary',
            'area' =>'required|string',
            'city'  =>'required|string',
            'city_id'  =>'required|integer',
            'district'  =>'required|string',
            'district_id'  =>'required|integer',
            'state'  =>'required|string',
            'state_id'  =>'required|integer',
            'description_video'=> 'required|url',
            'roles_responsibility'=>'required',
            'cta1'=>'required|url',
            'cta1_text'=>'required|string',
            'cta2'=>'required|url',
            'cta2_text'=>'required|string',
            'min_education'=> 'required',
            'experience_required'=>'required',
            'skills_required'   =>'required',
            'documents_required'=>'required',
            'additional_requirement'=>'nullable|string',
            'pincode'=>'required',
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
