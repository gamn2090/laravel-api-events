<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $Company = Company::where('active', true)->get();

            return response()->json(
                [ 
                    'ok'=> true,
                    'Company' => $Company
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in CompanyController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        try {

            $imageName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('images'), $imageName);
            $saveDir = public_path('images').'/'.$imageName;

            $Company = Company::create([
                'name' => $request->name,
                'image' => $saveDir,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Company' => $Company
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in CompanyController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Company = Company::where('active', true)->findOrFail($id);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Company' => $Company
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in CompanyController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        try {
            
            $imageName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('images'), $imageName);
            $saveDir = public_path('images').'/'.$imageName;

            $Company = Company::where('active', true)->findOrFail($id);
            $Company->name = $request->name;
            $Company->image = $saveDir;
            $Company->address = $request->address;
            $Company->phone_number = $request->phone_number;
            $Company->save();
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'Company' => $Company
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in CompanyController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $Company = Company::where('active', true)->findOrFail($id);
            $Company->active = false;           
            $Company->save();
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'message' => 'Company Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in CompanyController.destroy'
            ]);
        }
    }
}
