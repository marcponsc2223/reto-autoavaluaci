<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UsuariResource;
use App\Models\Modul;
use App\Models\Usuari;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class UsuariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = Usuari::all();

        return UsuariResource::collection($u);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function show(Usuari $usuari)
    {
        //
    }
    public function showAll() {
        // ->groupBy('id')
        $moduls = Usuari::with('modul')->where('tipus_usuaris_id', '=', 3)->get();
        return UsuariResource::collection($moduls);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Usuari::find($id);

        $modul = $request->input('moduls_id');
        $user->modul()->sync($modul, false);

        return response()->json(['message' => 'Relaciones de usuarios añadidas correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $usuari = Usuari::find($id);
        $usuari->modul()->detach();

        return response()->json(['message' => 'Relaciones de usuarios eliminadas correctamente'], 200);
    
    }

    public function sacarNota($id) {
        $r = Usuari::with('criteris_avaluacio')->find($id);
        return UsuariResource::collection($r->criteris_avaluacio);
    }

    public function showAllModuls() 
    {
// ->groupBy('id')
        $moduls = Usuari::with('modul')->where('tipus_usuaris_id', '=', 3)->get();
        return UsuariResource::collection($moduls);
    }
}
