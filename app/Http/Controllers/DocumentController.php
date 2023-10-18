<?php

namespace App\Http\Controllers;
use App\Http\Requests\Document\DocumentRequest;
use App\Models\Document;

class DocumentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $Document = Document::all();

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Document' => $Document
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in DocumentController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        try {

            $Document = Document::create([
                'description' => $request->description,
            ]);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Document' => $Document
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in DocumentController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Document = Document::findOrFail($id);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Document' => $Document
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in DocumentController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, string $id)
    {
        try {         

            $Document = Document::findOrFail($id);
            $Document->description = $request->description;
            $Document->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'Document' => $Document
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in DocumentController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Document::destroy($id);           
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'message' => 'Document Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in DocumentController.destroy'
            ]);
        }
    }
}
