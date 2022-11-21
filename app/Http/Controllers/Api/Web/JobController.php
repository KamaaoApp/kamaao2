<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    const job_type = ['part-time'=> '1','full-time'=> '2','fresher'=> '3' ,'contract'=> '4','temporary'=> '5'];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Job::all();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $validatedData      =   $request->validated();
        // die($validatedData['total_openings']);
        $validatedData      =   array_merge($validatedData, ['opening_left' => $validatedData['total_openings']]);
        $NewCompany         =   Job::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Company Details Inserted Successfully',
                'data'  => $NewCompany->id,
            ]);
            // echo date('Y-m-d');
        
        // dd(config('myglobal.job_type.part-time'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        
        return response()->json(['status'=>200,'data'=>$job]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
