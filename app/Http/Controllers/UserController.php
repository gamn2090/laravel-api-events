<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

#Controllers
use App\Models\User;

class UserController extends Controller
{
    public function userProfile(Request $req)
    {
        return response()->json([
            "message" => "userProfile OK",
            "data" => auth()->user(),
        ], Response::HTTP_OK);
    }

    public function allUsers() {
        $users = User::all();
        return response()->json([
         "users" => $users
        ]);
     }
}
