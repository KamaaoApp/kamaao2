<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'job_title'=>'required|min:3',
            'sub_title'=>'required|min:3',
            'job_type'=>'required',
            'job_category'=>'required',
            'company_id'=>'required',
            'last_date'=> 'required|date|date_format:Y-m-d|after:today',
            'total_openings'=>'required|integer',
            'min_salary' => 'required|integer',
            'max_salary' => 'required|integer|gt:min_salary',
            'area' =>'required',
            'city'  =>'required',
            'city_id'  =>'required|integer',
            'state'  =>'required',
            'state_id'  =>'required|integer',
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
        ];
    }
}
