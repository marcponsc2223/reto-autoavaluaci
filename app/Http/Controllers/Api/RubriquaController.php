<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RubricaResource;
use App\Models\Rubrica;
use Illuminate\Http\Request;

class RubriquaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crit = Rubrica::all();

        return RubricaResource::collection($crit);
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
     * @param  \App\Models\Rubrica  $rubrica
     * @return \Illuminate\Http\Response
     */
    public function show(Rubrica $rubrica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rubrica  $rubrica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubrica $rubrica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rubrica  $rubrica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubrica $rubrica)
    {
        //
    }
}
