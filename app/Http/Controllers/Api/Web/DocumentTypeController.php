<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Http\Requests\StoreDocumentTypeRequest;
use App\Http\Requests\UpdateDocumentTypeRequest;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocumentType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentTypeRequest $request)
    {
        $validatedData      =   $request->validated();
        $NewCompany         =   DocumentType::create($validatedData);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Document Inserted Successfully',
                'data'  => $NewCompany->id,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documentType)
    {
        return response()->json(['status'=>200,'data'=>$documentType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentTypeRequest  $request
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentTypeRequest $request, DocumentType $documentType)
    {
        $validatedData      =   $request->validated();
        $documentType->update($validatedData);
        return response()->json([
            'status'=>200,
            'message'=>'Document Type Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();
        return response()->json(['status'=>200,'message'=>'Document Type Deleted']);
    }
}
