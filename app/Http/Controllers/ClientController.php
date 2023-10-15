<?php

namespace App\Http\Controllers;
use App\Http\Requests\Client\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $local = Client::all();

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
                'message' => 'Something went wrong in ClientController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        try {

            $Client = Client::create([
                'name' => $request->name,
                'user_id' => $request->user_id,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'email' => $request->email,
                'document_id' => $request->document_id,
                'document_number' => $request->document_number,
                'client_type' => $request->client_type,
            ]);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Client' => $Client
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ClientController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Client = Client::findOrFail($id);

            return response()->json(
                [ 
                    'ok'=> true,
                    'Client' => $Client
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ClientController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, string $id)
    {
        try {         

            $Client = Client::findOrFail($id);
            $Client->name = $request->name;
            $Client->user_id = $request->user_id;           
            $Client->phone_number = $request->phone_number;           
            $Client->address = $request->address;           
            $Client->email = $request->email;           
            $Client->document_id = $request->document_id;           
            $Client->document_number = $request->document_number;           
            $Client->client_type = $request->client_type;           
            $Client->save();
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'Client' => $Client
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ClientController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Client::destroy($id);           
               
            return response()->json(
                [ 
                    'ok'=> true,
                    'message' => 'Client Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ClientController.destroy'
            ]);
        }
    }
}
