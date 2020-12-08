<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password']=bcrypt($input['password']);

        $rules=[
            'name'=> 'required',
            'lastName'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'password'=> 'required' 
        ];

        $messages=[
            'name.required' => 'No has introducido el nombre',
            'lastName.required' => 'No has introducido los apellidos',
            'phone.required' => 'No has introducido el nombre',
            'email.required' => 'No has introducido email',
            'password.required' => 'No has introducido el password',
        ];

        $validator = validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400); 
        }else{
         
            $newUser=User::create($input);
            return $newUser;
        }
    }

    public function login(Request $request)
    {
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credenciales)){
            $user = Auth::user();
            $token = $user->createToken('User')->accessToken;

            $respuesta=[];
            $respuesta['name']= $user->name;
            $respuesta['token']= 'Bearer '.$token;
            return response()->json($respuesta, 200);
        }else{
            return response()->json(['error'=>'Credenciales incorrectas'], 401);
        }
    }
}
