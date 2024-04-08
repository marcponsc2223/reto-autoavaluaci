<?php

namespace App\Http\Controllers\Api;

use App\Models\Modul;
use App\Models\Resultats_aprenentatge;

use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModulResource;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Usuari::find($usuari->id)->modul->isEmpty();
        // $m = Usuari::whereHas('modul')->get();
        $m = Modul::all();
        return ModulResource::collection($m);

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
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function show($modul)
    {
        $modulId = Modul::find($modul);
        // log($modulId);
        var_dump($modul);
        die();
        return ModulResource::collection($modulId);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modul $modul, Request $request)
    {
        // $usuaris_has_moduls
        // try {
        //     $modul->delete();
        //     $response = \response()
        //                 ->json(['missatge' => 'Registre esborrat correctament'], 200);

        // } catch (QueryException $ex) {
        //     $mensaje = Utilitat::errorMessage($ex);
        //     $response = \response()
        //     ->json(['error'=> $mensaje], 400);

        // }
        // return $response;
    }
}
