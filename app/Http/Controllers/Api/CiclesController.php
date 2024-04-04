<?php

namespace App\Http\Controllers\Api;

use App\Models\Cicles;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicleResource;
use Illuminate\Database\QueryException;

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
        $cicle = new Cicles();

        $cicle->sigles = $request->sigles; 
        // $cicle->nom = $request->nom; 
        $cicle->descripcio = $request->desc; 
        $cicle->actiu = ($request->input('actiu') == 'actiu');

        try 
        {
            $cicle->save();
            $response = (new CicleResource($cicle))
                        ->response()
                        ->setStatusCode(201);    
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
            ->json(['error'=> $mensaje], 400);
        }
        
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cicles  $cicle
     * @return \Illuminate\Http\Response
     */
    public function show(Cicles $cicle)
    {
        return new CicleResource($cicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cicles  $cicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cicles $cicle)
    {
        $cicle->sigles = $request->sigles; 
        $cicle->descripcio = $request->desc; 
        $cicle->actiu = ($request->input('actiu') == 'actiu');

        try 
        {
            $cicle->save();
            $response = (new CicleResource($cicle))
                        ->response()
                        ->setStatusCode(201);    
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
            ->json(['error'=> $mensaje], 400);
        }
        
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cicles  $cicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cicles $cicle, Request $request)
    {
        try {
            $cicle->delete();
            $response = \response()
                        ->json(['missatge' => 'Registre esborrat correctament'], 200);

        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
            ->json(['error'=> $mensaje], 400);

        }
        return $response;
    }
}
