<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resultats_aprenentatge;
use Illuminate\Http\Request;
use App\Http\Resources\Resultats_aprenentatgeResource;


class Resultats_aprenentatgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ra = Resultats_aprenentatge::all();

        return Resultats_aprenentatgeResource::collection($ra);
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
     * @param  \App\Models\Resultats_aprenentatge  $resultats_aprenentatge
     * @return \Illuminate\Http\Response
     */
    public function show(Resultats_aprenentatge $resultats_aprenentatge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resultats_aprenentatge  $resultats_aprenentatge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultats_aprenentatge $resultats_aprenentatge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resultats_aprenentatge  $resultats_aprenentatge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultats_aprenentatge $resultats_aprenentatge)
    {
        //
    }

    public function mostrarResultadoAprendizaje($idModul)
    {
        $rubriques = Resultats_aprenentatge::with('criteris_avaluacio.rubriques.criteris_avaluacio')->where('moduls_id', $idModul)->groupBy('id')->get();

        return Resultats_aprenentatgeResource::collection($rubriques);
    }
   
}
