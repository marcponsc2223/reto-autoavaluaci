@extends('layouts.main')
@section('title', 'Usuaris')
@section('content') 
    <form action="{{ action([App\Http\Controllers\UsuariController::class, 'store']) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Correu</label>
            <input type="email" class="form-control" id="email"  placeholder="jon@gmail.com" name="email">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom"  placeholder="Nom..." name="nom">
        </div>
        <div class="form-group">
            <label for="cognoms">Cognom</label>
            <input type="text" class="form-control" id="cognoms"  placeholder="Doe..." name="cognoms" >
        </div>
        <div class="form-group">
            <label for="contrasenya">Contrasenya</label>
            <input type="password" class="form-control" id="contrasenya"  placeholder="*****" name="contrasenya">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="ac" value="actiu" name="actiu">
            <label class="form-check-label" for="ac">Actiu</label>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="number" class="form-control" id="rol"  placeholder="1..." name="rol">
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
@endsection