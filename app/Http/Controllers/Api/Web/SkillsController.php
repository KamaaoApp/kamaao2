<?php

namespace App\Http\Controllers\api\web;

use App\Http\Controllers\Controller;
use App\Models\skills;
use App\Http\Requests\StoreskillsRequest;
use App\Http\Requests\UpdateskillsRequest;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return skills::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreskillsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreskillsRequest $request)
    {
        
        $validatedData      =   $request->validated();
        $newSkill     =   skills::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Skill Details Inserted Successfully',
                'data'  => $newSkill->id,
            ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(skills $skills)
    {
        return response()->json(['status'=>200,'data'=>$skills]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateskillsRequest  $request
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateskillsRequest $request, skills $skills)
    {
        $validatedData      =   $request->validated();
        $skills->update($validatedData);
        return response()->json([
            'status'=>200,
            'message'=>'Skill Details Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(skills $skills)
    {
        if($skills->delete())
        {
            return response()->json(['status'=>200,'message'=>'Skill Details  Deleted']);
        }
        else
        {
            return response()->json(['status'=>400,'message'=>'Something Went Wrong'],400);
        }
    }
}
