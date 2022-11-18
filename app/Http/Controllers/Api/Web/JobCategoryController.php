<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Http\Requests\StoreJobCategoryRequest;
use App\Http\Requests\UpdateJobCategoryRequest;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobCategory::all();
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobCategoryRequest $request)
    {
        $validatedData      =   $request->validated();
        $newJobCategory     =   JobCategory::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Company Details Inserted Successfully',
                'data'  => $newJobCategory->id,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $jobCategory)
    {
        return response()->json(['status'=>200,'data'=>$jobCategory]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobCategoryRequest  $request
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobCategoryRequest $request, JobCategory $jobCategory)
    {
        $validatedData      =   $request->validated();
        $jobCategory->update($validatedData);
        return response()->json([
            'status'=>200,
            'message'=>'Job Category Details Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $jobCategory)
    {
        if($jobCategory->delete())
        {
            return response()->json(['status'=>200,'message'=>'Job Category Details  Deleted']);
        }
        else
        {
            return response()->json(['status'=>400,'message'=>'Something Went Wrong'],400);
        }
    }
}
