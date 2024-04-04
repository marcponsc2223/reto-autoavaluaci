<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Criteris_avaluacio;
use Illuminate\Http\Request;
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
        //
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
}