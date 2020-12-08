<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Dentista;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();
        return $citas;
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
            'fecha'=> 'required',
            'hora'=> 'required' 
        ];

        $messages=[
            'fecha.required' => 'No has introducido la fecha',
            'hora.required' => 'No has introducido la hora'
        ];

        $validator = validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400); 
        }else{
         
            $nueva_cita=Cita::create($input);
            return $nueva_cita;
            
        }

        /*
        //Guardamos en variables los datos introducidos por el body

        $tratamiento = $request->input('tratamiento');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $estado = 'pendiente';
        $cliente_id = $request->input('cliente_id');
        $dentista_id = $request->input('dentista_id');

        try {

            $nueva_cita = Cita::create(
                [
                    'tratamiento' => $tratamiento,
                    'fecha' => $fecha,
                    'hora' => $hora,
                    'estado' => $estado,
                    'cliente_id' => $cliente_id,
                    'dentista_id' => $dentista_id,

                ]);

                return $nueva_cita;
        
        }catch(QueryException $error) {
            dd($request);
            return response()-> json([
                'error' => 'No se pudo crear la cita'
            ], 500);
        };
        */
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
