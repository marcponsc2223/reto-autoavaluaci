<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CicleResource;
use App\Models\Cicles;
use Illuminate\Http\Request;

class CiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cicles = Cicles::all();

        return CicleResource::collection($cicles);
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
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function show(Cicle $cicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cicle $cicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cicle $cicle)
    {
        //
    }
}
