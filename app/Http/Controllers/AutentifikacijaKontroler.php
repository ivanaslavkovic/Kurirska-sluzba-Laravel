<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AutentifikacijaKontroler extends Controller
{



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json(['Info' => $validator->errors()]);
        }



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['Info' => 'Novi korisnik je registrovan']);
    }




    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(['Info' => 'Logout korisnika']);
    }







    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);



        if ($validator->fails()) {
            return response()->json(['Info' => $validator->errors()]);
        }

        $user = User::where('email', $request->email)->first();
       
       
        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json(['Info' => 'Greska! Pokusajte ponovo!']);
        } else {

            $token = $user->createToken('X_Login_Token')->plainTextToken;
            
            return response()->json(['Info' => 'Korisnik je ulogovan', 'Token' => $token]);
        }
    }
}
