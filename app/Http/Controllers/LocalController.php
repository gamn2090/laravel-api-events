<?php

namespace App\Http\Controllers;
use App\Http\Requests\Local\LocalRequest;
use App\Models\Local;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $local = Local::where('active', true)->get();

            return response()->json(
                [ 
                    'ok'=> true,
                    'local' => $local
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in LocalController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocalRequest $request)
    {
        try {

            $Local = Local::create([
                'name' => $request->name,
                'company_id' => $request->company_id,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Local' => $Local
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in LocalController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Local = Local::where('active', true)->findOrFail($id);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Local' => $Local
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in LocalController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(LocalRequest $request, string $id)
    {
        try {         

            $Local = Local::where('active', true)->findOrFail($id);
            $Local->name = $request->name;
            $Local->company_id = $request->company_id;
            $Local->address = $request->address;
            $Local->phone_number = $request->phone_number;
            $Local->save();
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'Local' => $Local
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in LocalController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $Local = Local::where('active', true)->findOrFail($id);
            $Local->active = false;           
            $Local->save();
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'message' => 'Local Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in LocalController.destroy'
            ]);
        }
    }
}
