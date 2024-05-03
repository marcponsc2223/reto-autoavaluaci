<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Models\Criteris_avaluacio;
use App\Http\Controllers\Controller;
use App\Http\Resources\Criteris_avaluacioResource;

class Criteris_avaluacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crit = Criteris_avaluacio::all();

        return Criteris_avaluacioResource::collection($crit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Criteris_avaluacio  $criteris_avaluacio
     * @return \Illuminate\Http\Response
     */
    public function show(Criteris_avaluacio $criteris_avaluacio)
    {
        $ra = request()->query('ras');

        // Ahora puedes usar este ID del módulo para buscar los datos relacionados en la base de datos
        $resultat = Criteris_avaluacio::find($ra);

        return Criteris_avaluacioResource::collection($resultat);

        // $resultat
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criteris_avaluacio  $criteris_avaluacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criteris_avaluacio $criteris_avaluacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criteris_avaluacio  $criteris_avaluacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criteris_avaluacio $criteris_avaluacio)
    {
        //
    }

    public function guardarNota($idUsu, $idCriteri, Request $request) 
    {
        $usuari = Usuari::find($idUsu);
        $criteri = Criteris_avaluacio::find($idCriteri);

        if (!$usuari || !$criteri) {
            return response()->json(['error' => 'Usuario o criterio no encontrado'], 404);
        }

        $notasList = [];

        foreach ($request->input('notes') as $key => $value) {
            $notasList[$key + 1] = ['nota' => intval($value)];
        }

        $usuari->criteris_avaluacio()->sync($notasList, false);

            
        return response()->json(['message' => 'Notas guardadas correctamente'], 200);

    }
}
