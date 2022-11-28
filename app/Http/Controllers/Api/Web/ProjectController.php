<?php

namespace App\Http\Controllers\api\web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprojectRequest $request)
    {
        $validated     =   $request->validated();
        
        $validatedData      =   array_merge($validated, ['opening_left' => $validated['total_openings']]);
        // dd($validatedData);
        $newProject         =   Project::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Company Details Inserted Successfully',
                'data'  => ['id'=>$newProject->id],
            ]);
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        return response()->json(['status'=>200,'data'=>$project]);      
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectRequest  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprojectRequest $request, project $project)
    {
        $validatedData      =   $request->validated();
        $project->update($validatedData);
        return response()->json([
            'status'=>200,
            'message'=>'Project Details Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();
        return response()->json(['status'=>200,'message'=>'Project Record Deleted']);
    }
}
