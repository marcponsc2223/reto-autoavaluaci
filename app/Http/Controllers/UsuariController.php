<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UsuariController extends Controller
{

    public function showLogin() 
    {
        return view('auth.login');
    }
    public function login(Request $request) 
    {
        
        $username = $request->username;
        $contra = $request->contrasenya;

        $user = Usuari::where('nom_usuari', $username)->first();

        if ($user != null && Hash::check($contra, $user->contrasenya)) {
            Auth::login($user);
            $response = redirect('/home');
        } else {
            $request->session()->flash('error', 'Usuari o contrasenya incorrectos');
            $response = redirect('/login')->withInput();
        }
        return $response;
    }
    public function logout() 
    {
        Auth::logout();
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $actiu = $request->input('actiuBuscar');

         if ($actiu === 'actiu') {
            $usuaris = Usuari::where('actiu', true)
            ->paginate(6)
            ->withQueryString();
         } else {
             $usuaris = Usuari::paginate(6);
         }
         $request->session()->flashInput($request->input());
 
         return view('users.index', compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.users');

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
        $u = new Usuari();
        $u->correu = $request->email;
        $u->nom_usuari = $request->nom;
        $u->nom = $request->nom;
        $u->cognom = $request->cognoms;
        $u->contrasenya = bcrypt($request->contrasenya);
        $u->actiu = $request->has('actiu');
        $u->tipus_usuaris_id = $request->rol;

        $u->save();

        return redirect()->action([UsuariController::class, 'index']);
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
     * To showPassword.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function showPassword(Usuari $usuari)
    {
        //
        return view('users/updatePassword', ['usuari' => $usuari]);
    }
/**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Usuari $usuari, Request $request)
    {
        //
        $usuari->contrasenya = bcrypt($request->contrasenya); 
        return redirect()->action([UsuariController::class, 'index']);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuari $usuari)
    {
        //
        // $usuario->contrasenya = Crypt::decrypt($usuario->contrasenya);


        return view('users/updateUsers', ['usuari' => $usuari]);
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
        //
        $usuari->correu = $request->email;
        $usuari->nom_usuari = $request->nomUsuari;
        $usuari->nom = $request->nom;
        $usuari->cognom = $request->cognoms;
        $usuari->contrasenya = bcrypt($request->contrasenya);
        $usuari->actiu = $request->has('actiu');
        $usuari->tipus_usuaris_id = $request->rol;

        $usuari->save();

        return redirect()->action([UsuariController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuari $usuari)
    {
        $user = Usuari::find($usuari->id)->modul->isEmpty();
        if ($user) {
            $usuari->delete();
        } 
        return redirect()->action([UsuariController::class, 'index']);
    }
}
