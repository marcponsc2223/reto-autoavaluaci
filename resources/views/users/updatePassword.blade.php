@extends('layouts.main')
@section('title', 'PasswordUpdate')
@section('content') 
    <form action="{{ action([App\Http\Controllers\UsuariController::class, 'changePassword'], ['usuari' => $usuari])}}"
    method="POST">
    @csrf
    {{-- @method('PUT') --}}
    {{-- Correu, nom, cognom, contra, actiu, rols_id(1, 2, 3) --}}
        <div class="form-group">
            <label for="contrasenya">Contrasenya</label>
            <input type="password" class="form-control" id="contrasenya"  placeholder="*****" name="contrasenya">
        </div>
        <button type="submit" class="btn btn-primary">Canviar Contrasenya</button>
    </form>
@endsection