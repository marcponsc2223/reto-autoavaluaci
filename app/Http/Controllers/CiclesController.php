<?php

namespace App\Http\Controllers;

use App\Models\Cicles;
use Illuminate\Http\Request;

class CiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cicles = Cicles::all();
        $actiu = $request->input('actiuBuscar');

        if ($actiu === 'actiu') {
           $cicles = Cicles::where('actiu', true)
           ->paginate(6)
           ->withQueryString();
        } else {
            $cicles = Cicles::paginate(6);
        }
        $request->session()->flashInput($request->input());

        return view('cicles.index', compact('cicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cicles/cicles');
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
        $cicle->nom = $request->nom; 
        $cicle->descripcio = $request->desc; 
        $cicle->actiu = ($request->input('actiu') == 'actiu');

        $cicle->save();
        
        return redirect()->action([CiclesController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cicles  $cicles
     * @return \Illuminate\Http\Response
     */
    public function show(Cicles $cicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cicles  $cicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Cicles $cicle)
    {
        //
        // return view('cicles/cicles');

        return view('cicles/updateCicle', ['cicle' => $cicle]);

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
        //
        // $cicle = Cicles::find($cicle);
        $cicle->sigles = $request->sigles;
        $cicle->nom = $request->nom;
        $cicle->descripcio = $request->desc;
        $cicle->actiu = ($request->input('actiu') == 'actiu');

        // $cicle->attribute = 'new Value';
        $cicle->save();
        return redirect()->action([CiclesController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cicles  $cicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cicles $cicle)
    {
        //
        $cicle->delete();

        return redirect()->action([CiclesController::class, 'index']);
    }
}
