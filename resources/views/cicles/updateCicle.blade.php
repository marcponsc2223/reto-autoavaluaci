@extends('layouts.main')
@section('title', 'CiclesUpdate')
@section('content') 
    <form action="{{ action([App\Http\Controllers\CiclesController::class, 'update'], ['cicle' => $cicle->id])}}"
    method="POST">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="sigles">Sigles</label>
            <input type="text" class="form-control" id="sigles"  placeholder="DAW.." name="sigles" value="{{$cicle->sigles}}">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom"  placeholder="Nom..." name="nom" value="{{$cicle->nom}}">
        </div>
        <div class="form-group">
            <label for="desc">Desc</label>
            <input type="text" class="form-control" id="desc"  placeholder="Desc..." name="desc" value="{{$cicle->descripcio}}">
        </div>
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
        <button type="submit" class="btn btn-primary">Editar Cicle</button>
    </form>
@endsection