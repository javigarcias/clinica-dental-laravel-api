<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardamos en variables los datos introducidos por el body

        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $password = $request->input('password');

        //Encriptación del password

        $password = Hash::make($password);

        try {

            return Cliente::create(
                [
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'telefono' => $telefono,
                    'email' => $email,
                    'password' => $password,
                ]);
        
        }catch(QueryException $error) {
            
            $eCode = $error->errorInfo[1];

            if($eCode == 1062) {
                return response()->json([
                    'error' => "El mail introducido ya está registrado"
                ]);
            }
        }
    }

/*
        $input=$request->all();

        $rules=[
            'nombre'=> 'required|min:5',
            'apellidos'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ];

        $messages=[
            'nombre.required' => 'No has introducido el nombre',
            'nombre.min' => 'El nombre tiene menos de 5 caracteres',
            'telefono.required' => 'No has introducido el teléfono',
            'email.required' => 'No has introducido el mail',
            'password.required' => 'No has introducido el password',
        ];

        $validator = validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400); 
        }else{
            $cliente=Cliente::create($input);
            return $cliente;
        }
    }
*/
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
