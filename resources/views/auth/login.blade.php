@extends('layouts.main')
@section('title', 'Login')
@section('content') 
    <form action="{{ action([App\Http\Controllers\UsuariController::class, 'login'])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Usuari</label>
            <input type="text" class="form-control" id="username" name="username"placeholder="Enter user">
        </div>
        <div class="form-group">
            <label for="contrasenya">Contrasenya</label>
            <input type="password" class="form-control" id="contrasenya" name="contrasenya" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesio</button>
        <button type="submit" class="btn btn-secondary">Cancelar</button>
    </form>
@endsection