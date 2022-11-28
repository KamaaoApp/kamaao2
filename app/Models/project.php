<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','sub_title','type','category','company_id','start_date','end_date','total_openings','amount','area','city','city_id','state','state_id','term_conditions','description_video','roles_responsibility','cta1','cta1_text','cta2','cta2_text','min_education','experience_required','skills_required','documents_required','additional_requirement', 'opening_left'];
    protected $with = ['company', 'city'];

    
    public function company()
    {
        return $this->belongsTo(Company::class)->select(['id', 'company_legal_name', 'company_popular_name', 'company_logo']);
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
