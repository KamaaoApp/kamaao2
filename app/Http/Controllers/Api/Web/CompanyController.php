<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Traits\ImageUpload; 

class CompanyController extends Controller
{

    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Company= Company::all();

        if(count($Company))
        {
            return response()->json([
                'status'=>200,
                'data'=>$Company
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
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $image_path     =   '';
        if($request->hasfile('company_logo'))
        {
            $image      = $request->file('company_logo');
            $folder     = public_path('assets/images/company');
            $name       = Str::random(30).'_' . time();
            $filePath   = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadImage($image, $folder, 'public', $name);
            $image_path = 'assets/images/company/'. $name . '.' . $image->getClientOriginalExtension();        
        }
        $validatedData      =   $request->validated();
        $validatedData      =   array_merge($validatedData, ['is_enabled' => 1,'company_logo'=> $image_path]);
        $NewCompany         =   Company::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Company Details Inserted Successfully',
                'data'  => $NewCompany->id,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json(['status'=>200,'data'=>$company]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $Company =  Company::find($company);
        if($Company)
        {
            $image_path     =   '';
            if($request->hasfile('company_logo'))
            {
                $image      = $request->file('company_logo');
                $folder     = public_path('assets/images/company');
                $name       = Str::random(30).'_' . time();
                $filePath   = $folder . $name . '.' . $image->getClientOriginalExtension();
                $this->uploadImage($image, $folder, 'public', $name);
                $image_path = 'assets/images/company/'. $name . '.' . $image->getClientOriginalExtension();        
            }
            $validatedData      =   $request->validated();
            $validatedData      =   array_merge($validatedData, ['is_enabled' => 1,'company_logo'=> $image_path]);
            $company->update(array_filter($validatedData));
            return response()->json([
                'status'=>200,
                'message'=>'Company Details updated'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Company Id  Not Found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    { 
        if($company->delete())
        {
            return response()->json(['status'=>200,'message'=>'Company Details  Deleted']);
        }
        else
        {
            return response()->json(['status'=>400,'message'=>'Something Went Wrong'],400);
        }
    }
}
