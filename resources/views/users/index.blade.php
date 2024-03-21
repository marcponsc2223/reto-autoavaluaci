@extends('layouts.main')
@section('title', 'Usuaris')
@section('content') 
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Buscar</h5>
        <form action="{{ action([App\Http\Controllers\UsuariController::class, 'index']) }}">
            <div class="form-row">
                <div class="col-1">
                    @if (old('actiuBuscar') == 'actiu')
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="actiuBuscar" name="actiuBuscar" value="actiu" checked>
                            <label class="custom-control-input" for="actiuBuscar">Actiu</label>
                        </div>
                    @else 
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="actiuBuscar" name="actiuBuscar" value="actiu">
                            <label class="custom-control-input" for="actiuBuscar">Actiu</label>
                        </div>
                    @endif
                    
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Correu</th>
        <th scope="col">Nom Usuari</th>
        <th scope="col">Nom</th>
        <th scope="col">Cognoms</th>
        <th scope="col">Contrasenya</th>
        <th scope="col">Actiu</th>
        <th scope="col">Rol</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($usuaris as $user)
      <tr>
        <td>{{$user->correu}}</td>
        <td>{{$user->nom_usuari}}</td>
          <td>{{$user->nom}}</td>
          <td>{{$user->cognom}}</td>
          <td>{{$user->contrasenya}}</td>
          <td>
            @if ($user->actiu) 
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
        </td>
        <td>{{$user->tipus_usuaris_id}}</td>
        <td>
            <form class="float-right ml-1" action="{{ action([App\Http\Controllers\UsuariController::class, 'destroy'], ['usuari' => $user->id])}}" 
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash" aria-hidden="true">Esborrar</i></button>
            </form>
            <form class="float-right" action="{{ action([App\Http\Controllers\UsuariController::class, 'edit'], ['usuari' => $user])}}">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">
                    <i class="fa fa-edit" aria-hidden="true">Editar</i></button>
            </form>
            {{-- [App\Http\Controllers\UsuariController::class, 'showPassword'] --}}
            {{-- route('usuari.showPassword' --}}
            {{-- route('usuari.showPassword'), ['usuari' => $user] --}}
            <form class="float-right" action="{{ action([App\Http\Controllers\UsuariController::class, 'showPassword'], ['usuari' => $user]) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">
                    <i class="fa fa-edit" aria-hidden="true">Canviar Contrasenya</i>
                </button>
            </form>
        </td>
      </tr>     
      @endforeach
    </tbody>
  </table>
  {{ $usuaris->links()}}
  <a href="{{ url('usuari/create')}}" class="btn btn-primary btn-float-afegir"><i class="fa fa-plus-circle" aria-hidden="true">Nou user</i></a>
@endsection