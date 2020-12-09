<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Dentista;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        $citas = Cita::all();
        return $citas;
    }

    public function index($user)
    {
        $citasUser = DB::table('citas')
                ->where('user_id', '=', $user)
                ->get();
        return $citasUser;
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
        Cita::destroy($cita->id);
        return response()->json('Cita Borrada correctamente', 200);
    }
}
