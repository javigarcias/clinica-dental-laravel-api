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
        $input = $request->all();

        $rules=[
            'nombre'=> 'required',
            'especialidad'=> 'required',
        ];

        $messages=[
            'nombre.required' => 'No has introducido el nombre',
            'especialidad.required' => 'No has introducido su especialidad',
        ];

        $validator = validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400); 
        }else{
         
            $nuevoDentista = Dentista::create($input);
            return $nuevoDentista;
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
