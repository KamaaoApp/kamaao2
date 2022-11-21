<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    use HasFactory;
    protected $fillable = ['job_title', 'sub_title','job_type','job_category','company_id',
                            'last_date','total_openings','min_salary','max_salary','city','city_id',
                            'state','state_id','description_video','roles_responsibility','cta1',
                            'cta1_text','cta2','cta2_text','min_education','experience_required',
                            'skills_required','documents_required','additional_requirement', 'area' ];

    protected $with = ['company', 'city', 'skills'];

    public function company()
    {
        return $this->belongsTo(Company::class)->select(['id', 'company_legal_name', 'company_popular_name', 'company_logo']);
    }

    public function city()
    {
        return $this->hasOne(city::class, 'id', 'city_id')->select(['id', 'city', 'state_id']);
    }
    
    


}
