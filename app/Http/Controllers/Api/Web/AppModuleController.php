<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Models\AppMudules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;


class AppModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules    =   AppMudules::all();
        
        if(count($modules))
        {
            return response()->json([
                'status'=>200,
                'data'=>$modules
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=> "No Records Found"
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:App_Mudules|max:50',
        ]);
 
        if ($validator->fails()) {
             return response()->json([
                'status'=>422,
                'errors'=>$validator->errors(),
        ],422);
        }
        $newModule  =   AppMudules::create($validator->validated());
        if($newModule->id)
        {
            Permission::create(
                ['guard_name' => 'sanctum','name' => $request->title.'-create'] 
            );
            Permission::create(
                ['guard_name' => 'sanctum','name' => $request->title.'-list']
            );
            Permission::create(
                
                ['guard_name' => 'sanctum','name' => $request->title.'-edit'],
            );
            Permission::create(
                ['guard_name' => 'sanctum','name' => $request->title.'-delete']
            );
            return response()->json(
                [
                    'status'=>200,
                    'message'=>'New Module created',
                    'data'  => $newModule->id,
                ]);
        }
        
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppMudules  $appMudules
     * @return \Illuminate\Http\Response
     */
    public function show(AppMudules $appMudules)
    {
        return response()->json(['status'=>200,'data'=>$appMudules]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppMudules  $appMudules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppMudules $appMudules)
    {
        /** NOT ALLOWED */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppMudules  $appMudules
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppMudules $appMudules)
    {
        if($appMudules->delete())
        {
            return response()->json(['status'=>200,'message'=>'Module Details  Deleted']);
        }
        else
        {
            return response()->json(['status'=>400,'message'=>'Something Went Wrong'],400);
        }
    }
}
