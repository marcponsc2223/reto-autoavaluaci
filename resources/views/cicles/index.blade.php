@extends('layouts.main')
@section('title', 'Cicles')
@section('content') 
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Buscar</h5>
        <form action="{{ action([App\Http\Controllers\CiclesController::class, 'index']) }}">
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
        <th scope="col">Sigles</th>
        <th scope="col">Nom</th>
        <th scope="col">Dscripcio</th>
        <th scope="col">Actiu</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cicles as $cicle)
      <tr>
        <td>{{$cicle->sigles}}</td>
          <td>{{$cicle->nom}}</td>
          <td>{{$cicle->descripcio}}</td>
          <td>
            @if ($cicle->actiu) 
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
        <td>
            <form class="float-right ml-1" action="{{ action([App\Http\Controllers\CiclesController::class, 'destroy'], ['cicle' => $cicle->id])}}" 
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash" aria-hidden="true">Esborrar</i></button>
            </form>
            <form class="float-right" action="{{ action([App\Http\Controllers\CiclesController::class, 'edit'], ['cicle' => $cicle])}}">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">
                    <i class="fa fa-edit" aria-hidden="true">Editar</i></button>
            </form>
        </td>
      </tr>     
      @endforeach
    </tbody>
  </table>
  {{ $cicles->links()}}
  <a href="{{ url('cicle/create')}}" class="btn btn-primary btn-float-afegir"><i class="fa fa-plus-circle" aria-hidden="true">Nou cicle</i></a>
@endsection