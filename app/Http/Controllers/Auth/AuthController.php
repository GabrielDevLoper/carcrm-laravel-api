<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:6']
        ], [
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'O email é já foi registrado',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve conter no minimo 6 caracteres',

        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $date = Carbon::now();
        $deleted_account = Carbon::now();

        // Salvando os dados no banco de dados
        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
            'next_expiration' => $date->addDays(7),
            'deleted_account' => $deleted_account->addDays(15)
        ]);

        if($user->id) {
            return response()->json([
                'access_token' => $user->createToken('auth-api')->accessToken
            ], 200);
        }
    }
}
