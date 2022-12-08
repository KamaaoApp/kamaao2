<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'sub_title','type','category','company_id',
                            'last_date','total_openings','min_salary','max_salary','city','city_id',
                            'state','state_id',
                            'district',
                            'district_id',
                            'description_video','roles_responsibility','cta1',
                            'cta1_text','cta2','cta2_text','min_education','experience_required',
                            'skills_required','documents_required','additional_requirement', 'area', 'pincode'];

    protected $with = ['company', 'city'];

    public function company()
    {
        return $this->belongsTo(Company::class)->select(['id', 'legal_name', 'popular_name', 'logo']);
    }

    public function city()
    {

        return $this->hasOne(city::class, 'id', 'city_id')->select(['id', 'city', 'state_id']);
    }
    
    protected function skills($skills)
    {
        $arr  = explode(',',$skills);
        $getSkill = [];
        foreach($arr as $skill)
        {
            $getSkill[]= skills::find($skill);
        }
        return $getSkill;
    }
    
    public function getSkillsRequiredAttribute($value='')
    {
        $arr  = explode(',',$value);
        return  skills::whereIn('id', $arr)->select('id','skill')->get();
    }

    public function getDocumentsRequiredAttribute($value='')
    {
        $arr  = explode(',',$value);
        return DocumentType::whereIn('id',$arr)->select('id','document_title')->get();
    }


}
