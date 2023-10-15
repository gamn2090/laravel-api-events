<?php

namespace App\Http\Controllers;
use App\Http\Requests\Table\TableRequest;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $Table = Table::all();

            return response()->json(
                [ 
                    'ok'=> true,
                    'Table' => $Table
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in TableController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        try {

            $Table = Table::create([
                'name' => $request->name,
                'local_id' => $request->local_id,
            ]);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Table' => $Table
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in TableController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Table = Table::findOrFail($id);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Table' => $Table
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in TableController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        try {         

            $Table = Table::findOrFail($id);
            $Table->name = $request->name;
            $Table->local_id = $request->local_id;           
            $Table->save();
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'Table' => $Table
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in TableController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Table::destroy($id);           
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'message' => 'Table Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in TableController.destroy'
            ]);
        }
    }
}
