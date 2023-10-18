<?php

namespace App\Http\Controllers;
use App\Http\Requests\Invoice\InvoiceRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Detail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $Invoice = Invoice::with('detail','detail.product')->where('active', true)->get();

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Invoice' => $Invoice
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in InvoiceController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        try {

            DB::beginTransaction();

            $Invoice = Invoice::create([
                'local_id' => $request->local_id,
                'event_id' => $request->event_id,
                'client_id' => $request->client_id,
                'total' => $request->total,
                'subtotal' => $request->subtotal,
                'taxes' => $request->taxes,
                'observation' => $request->observation,
                'creation_date' => $request->creation_date
            ]);

            foreach($request->detail as $detail){
                Detail::create([
                    'invoice_id' => $Invoice->id,
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity'],
                    'price' => $detail['price']
                ]);
            }

            DB::commit();

            $invoiceResponse = Invoice::with('detail','detail.product')
                                      ->where('active', true)
                                      ->findOrFail($Invoice->id);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Invoice' => $invoiceResponse
                ]
                , 200
            );

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in InvoiceController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Invoice = Invoice::with('detail','detail.product')->where('active', true)->findOrFail($id);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Invoice' => $Invoice
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in InvoiceController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, string $id)
    {
        try {         

            $Invoice = Invoice::where('active', true)->findOrFail($id);
            $Invoice->local_id = $request->local_id;
            $Invoice->event_id = $request->event_id;
            $Invoice->client_id = $request->client_id;
            $Invoice->total = $request->total;
            $Invoice->subtotal = $request->subtotal;
            $Invoice->taxes = $request->taxes;
            $Invoice->observation = $request->observation;
            $Invoice->creation_date = $request->creation_date;
            isset($request->active) ? $Invoice->active = $request->active : $Invoice->active = $Invoice->active;
            isset($request->status) ? $Invoice->status = $request->status : $Invoice->status = $Invoice->status;
            $Invoice->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'Invoice' => $Invoice
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in InvoiceController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $Invoice = Invoice::where('active', true)->findOrFail($id);
            $Invoice->active = false;
            $Invoice->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'message' => 'Invoice Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in InvoiceController.destroy'
            ]);
        }
    }
}
