<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resultats_aprenentatgeResource;
use App\Models\Resultats_aprenentatge;
use Illuminate\Http\Request;

// Programar les APIs per gestionar els resultats d'aprenentatge i els criteris d'avaluació.

class Resultats_aprenentatgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crit = Resultats_aprenentatge::all();

        return Resultats_aprenentatgeResource::collection($crit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resultats_aprenentatge  $resultats_aprenentatge
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultats_aprenentatge $resultats_aprenentatge)
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
}
