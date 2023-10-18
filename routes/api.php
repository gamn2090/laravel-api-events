<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

#Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('inside-mware', function() {
        return response()->json('Success', 200);
    });
    /**
     * Users routes
     */
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('users', [UserController::class, 'allUsers']);

    /**
     * Company routes
     */
    Route::get('company', [CompanyController::class, 'index']);
    Route::post('company', [CompanyController::class, 'store']);
    Route::get('company/{id}', [CompanyController::class, 'show']);
    Route::post('company/{id}', [CompanyController::class, 'update']);
    Route::delete('company/{id}', [CompanyController::class, 'destroy']);
    
    /**
     * Local routes
     */
    Route::get('local', [LocalController::class, 'index']);
    Route::post('local', [LocalController::class, 'store']);
    Route::get('local/{id}', [LocalController::class, 'show']);
    Route::put('local/{id}', [LocalController::class, 'update']);
    Route::delete('local/{id}', [LocalController::class, 'destroy']);

    /**
     * Table routes
     */
    Route::get('table', [TableController::class, 'index']);
    Route::post('table', [TableController::class, 'store']);
    Route::get('table/{id}', [TableController::class, 'show']);
    Route::put('table/{id}', [TableController::class, 'update']);
    Route::delete('table/{id}', [TableController::class, 'destroy']);

    /**
     * Clients routes
     */
    Route::get('client', [ClientController::class, 'index']);
    Route::post('client', [ClientController::class, 'store']);
    Route::get('client/{id}', [ClientController::class, 'show']);
    Route::put('client/{id}', [ClientController::class, 'update']);
    Route::delete('client/{id}', [ClientController::class, 'destroy']);

    /**
     * Documents routes
     */
    Route::get('document', [DocumentController::class, 'index']);
    Route::post('document', [DocumentController::class, 'store']);
    Route::get('document/{id}', [DocumentController::class, 'show']);
    Route::put('document/{id}', [DocumentController::class, 'update']);
    Route::delete('document/{id}', [DocumentController::class, 'destroy']);

    /**
     * Events routes
     */
    Route::get('event', [EventController::class, 'index']);
    Route::post('event', [EventController::class, 'store']);
    Route::get('event/{id}', [EventController::class, 'show']);
    Route::post('event/{id}', [EventController::class, 'update']);
    Route::delete('event/{id}', [EventController::class, 'destroy']);

    /**
     * Invoices routes
     */
    Route::get('invoice', [InvoiceController::class, 'index']);
    Route::post('invoice', [InvoiceController::class, 'store']);
    Route::get('invoice/{id}', [InvoiceController::class, 'show']);
    Route::put('invoice/{id}', [InvoiceController::class, 'update']);
    Route::delete('invoice/{id}', [InvoiceController::class, 'destroy']);

    /**
     * Products routes
     */
    Route::get('product', [ProductController::class, 'index']);
    Route::post('product', [ProductController::class, 'store']);
    Route::get('product/{id}', [ProductController::class, 'show']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy']);

    /**
     * Logout Route
     */
    Route::post('logout', [AuthController::class, 'logout']);
});