@extends('layouts.main')
@section('title', 'UsersUpdate')
@section('content') 
    <form action="{{ action([App\Http\Controllers\UsuariController::class, 'update'], ['usuari' => $usuari])}}"
    method="POST">
    @csrf
    @method('PUT')
    {{-- Correu, nom, cognom, contra, actiu, rols_id(1, 2, 3) --}}
        <div class="form-group">
            <label for="email">Correu</label>
            <input type="email" class="form-control" id="email"  placeholder="jon@gmail.com" name="email" value="{{$usuari->correu}}">
        </div>
        <div class="form-group">
            <label for="nomUsuari">Nom Usuari</label>
            <input type="text" class="form-control" id="nomUsuari"  placeholder="Nom..." name="nomUsuari" value="{{$usuari->nom_usuari}}">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom"  placeholder="Nom..." name="nom" value="{{$usuari->nom}}">
        </div>
        <div class="form-group">
            <label for="cognoms">Cognom</label>
            <input type="text" class="form-control" id="cognoms"  placeholder="Doe..." name="cognoms" value="{{$usuari->cognom}}">
        </div>
        {{-- <div class="form-group">
            <label for="contrasenya">Contrasenya</label>
            <input type="password" class="form-control" id="contrasenya"  placeholder="*****" name="contrasenya" value="{{$passwd}}">
        </div> --}}
        @if ($usuari->actiu) 
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ac" value="actiu" checked>
                <label class="form-check-label" for="ac"></label>
            </div>
        @else
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ac" value="actiu">
                <label class="form-check-label" for="ac"></label>
            </div>
        @endif
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="number" class="form-control" id="rol"  placeholder="1..." name="rol" value="{{$usuari->tipus_usuaris_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Editar Usuario</button>
    </form>
@endsection