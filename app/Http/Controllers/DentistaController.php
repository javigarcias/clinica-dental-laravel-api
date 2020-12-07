<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class DentistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dentistas = Dentista::all();
        return $dentistas;
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
       $email = $request->input('email');
       $password = $request->input('password');

       //Encriptación del password

       $password = Hash::make($password);

       try {

           return Dentista::create(
               [
                   'nombre' => $nombre,
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
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function show(Dentista $dentista)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dentista $dentista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dentista $dentista)
    {
        //
    }
}
