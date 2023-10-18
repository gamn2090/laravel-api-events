<?php

namespace App\Http\Controllers;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $Product = Product::where('active', true)->get();

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Product' => $Product
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ProductController.index'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {

            $Product = Product::create([
                'local_id' => $request->local_id,
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'unidad' => $request->unidad
            ]);
            
            return response()->json(
                [ 
                    'Ok'=> true,
                    'Product' => $Product
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ProductController.store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $Product = Product::where('active', true)->findOrFail($id);

            return response()->json(
                [ 
                    'Ok'=> true,
                    'Product' => $Product
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ProductController.show'
            ]);
        }
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try {         

            $Product = Product::findOrFail($id);
            $Product->local_id = $request->local_id;
            $Product->name = $request->name;
            $Product->stock = $request->stock;
            $Product->price = $request->price;
            $Product->unidad = $request->unidad;            
            $Product->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'Product' => $Product
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ProductController.update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $Product = Product::where('active', true)->findOrFail($id);
            $Product->active = false;
            $Product->save();
               
            return response()->json(
                [ 
                    'Ok'=> true,
                    'message' => 'Product Deleted'
                ]
                , 200
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Something went wrong in ProductController.destroy'
            ]);
        }
    }
}
