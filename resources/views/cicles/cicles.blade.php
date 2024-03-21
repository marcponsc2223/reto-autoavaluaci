@extends('layouts.main')
@section('title', 'CiclesCreate')
@section('content') 
<form action="{{ action([App\Http\Controllers\CiclesController::class, 'store']) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="sigles">Sigles</label>
      <input type="text" class="form-control" id="sigles"  placeholder="DAW.." name="sigles">
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom"  placeholder="Nom..." name="nom">
    </div>
    <div class="form-group">
        <label for="desc">Desc</label>
        <input type="text" class="form-control" id="desc"  placeholder="Desc..." name="desc">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="actiu" name="actiu">
        <label class="form-check-label" for="actiu">Actiu</label>
      </div>
    <button type="submit" class="btn btn-primary">Crear Cicle</button>
</form>
@endsection