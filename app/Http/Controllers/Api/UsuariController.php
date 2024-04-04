<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UsuariResource;
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
    public function store(Request $request)
    {
        // $u = new Usuari();
        // $u->correu = $request->email;
        // $u->nom_usuari = $request->nom;
        // $u->nom = $request->nom;
        // $u->cognom = $request->cognoms;
        // $u->contrasenya = bcrypt($request->contrasenya);
        // $u->actiu = $request->has('actiu');
        // $u->tipus_usuaris_id = $request->rol;

        // // $u->save();
        // try 
        // {
        //     $u->save();
        //     $response = (new UsuariResource($u))
        //                 ->response()
        //                 ->setStatusCode(201);
        // } catch (QueryException $ex)
        // {
        //     $mensaje = Utilitat::errorMessage($ex);
        //     $response = \response()
        //     ->json(['error'=> $mensaje], 400);
        // }
        
        // return $response;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuari $usuari)
    {
        // $usuari->correu = $request->email;
        // $usuari->nom_usuari = $request->nomUsuari;
        // $usuari->nom = $request->nom;
        // $usuari->cognom = $request->cognoms;
        // $usuari->contrasenya = bcrypt($request->contrasenya);
        // $usuari->actiu = $request->has('actiu');
        // $usuari->tipus_usuaris_id = $request->rol;

        // try 
        // {
        //     $usuari->save();
        //     $response = (new UsuariResource($usuari))
        //                 ->response()
        //                 ->setStatusCode(201);
        // } catch (QueryException $ex)
        // {
        //     $mensaje = Utilitat::errorMessage($ex);
        //     $response = \response()
        //     ->json(['error'=> $mensaje], 400);
        // }
        
        // return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuari $usuari, Request $request)
    {
        $usuari->modul()->detach($request);
        // $usuari->usuari()->detach();

        return response()->json(['message' => 'Relaciones de usuarios eliminadas correctamente'], 200);
    
        // $user = Usuari::find($usuari->id)->modul->isEmpty();
        //     try 
        //     {
        //         if ($user) {
        //             $usuari->delete();
        //             $response = \response()
        //                         ->json(['missatge' => 'Registre esborrat correctament'], 200);
        //         }

        //     } catch (QueryException $ex)
        //     {
        //         $mensaje = Utilitat::errorMessage($ex);
        //         $response = \response()
        //         ->json(['error'=> $mensaje], 400);
        //     }
        //     // try 
        //     // {
        //     //     // if ($user) {
        //     //         $usuari->delete();
        //     //         $response = \response()
        //     //                 ->json(['missatge' => 'Registre esborrat correctament'], 200);
        //     //     // } 
        //     // } 
        //     // catch (QueryException $ex)
        //     // {
        //     //     $mensaje = Utilitat::errorMessage($ex);
        //     //     $response = \response()
        //     //     ->json(['error'=> $mensaje], 400);
        //     // }
        //     return $response;
    }
}
