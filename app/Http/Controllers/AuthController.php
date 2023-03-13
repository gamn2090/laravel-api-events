<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        //data validation       
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        //register the user
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();        

        //reponse
        return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $req)
    {
        //data validation       
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)){
            return response(["message"=>'Invalid credentials'],Response::HTTP_UNAUTHORIZED);            
        }

        /** @var User $user */
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        return response(["token"=>$token, "user"=>$user], Response::HTTP_OK);
    }

    public function logout(Request $req)
    {
        /** @var User $user */
        $user = $req->user();
        $user->currentAccessToken()->delete();
        return response('', Response::HTTP_NOT_MODIFIED);
    }   
}
