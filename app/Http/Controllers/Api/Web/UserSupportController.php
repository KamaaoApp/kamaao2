<?php

namespace App\Http\Controllers\api\web;

use App\Http\Controllers\Controller;
use App\Models\UserSupport;
use App\Http\Requests\StoreUserSupportRequest;
use App\Http\Requests\UpdateUserSupportRequest;
use App\Http\Traits\ImageUpload;

class UserSupportController extends Controller
{
    use ImageUpload;
    
    public function index()
    {
        return UserSupport::all();
    }
 
    public function store(StoreUserSupportRequest $request)
    {
        $image_path     =   '';
        $validatedData      =   $request->validated();
        if($request->hasfile('image1'))
        {
            $image      = $request->file('image1');
            $folder     = public_path('assets/images/userSupport');
            $name       = Str::random(30).'_' . time();
            $filePath   = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadImage($image, $folder, 'public', $name);
            $image_path = 'assets/images/userSupport/'. $name . '.' . $image->getClientOriginalExtension();        
            $validatedData      =   array_merge($validatedData, ['image1'=> $image_path]);

        }
        if($request->hasfile('image2'))
        {
            $image      = $request->file('image2');
            $folder     = public_path('assets/images/userSupport');
            $name       = Str::random(30).'_' . time();
            $filePath   = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadImage($image, $folder, 'public', $name);
            $image_path = 'assets/images/userSupport/'. $name . '.' . $image->getClientOriginalExtension();        
            $validatedData      =   array_merge($validatedData, ['image2'=> $image_path]);

        }
        $newSupportTicket         =   UserSupport::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Thank you for reaching out',
                'data'  => ['id'=>$newSupportTicket->id],
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSupport  $userSupport
     * @return \Illuminate\Http\Response
     */
    public function show(UserSupport $userSupport)
    {
        return response()->json(['status'=>200,'data'=>$userSupport]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserSupportRequest  $request
     * @param  \App\Models\UserSupport  $userSupport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSupportRequest $request, UserSupport $userSupport)
    {
        // NOT ALLOWED FOR NOW   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSupport  $userSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSupport $userSupport)
    {
        $userSupport->delete();
        return response()->json(['status'=>200,'message'=>'Support Ticket Deleted']);
    }
}
