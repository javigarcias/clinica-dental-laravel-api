<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            'email'=> 'required|unique',
            'password'=> 'required' 
        ];

        $messages=[
            'name.required' => 'No has introducido el nombre',
            'lastName.required' => 'No has introducido los apellidos',
            'phone.required' => 'No has introducido el nombre',
            'email.required' => 'No has introducido email',
            'email.unique' => 'El mail introducido ya existe',
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
