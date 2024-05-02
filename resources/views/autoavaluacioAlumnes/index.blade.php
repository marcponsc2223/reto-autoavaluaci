@extends('layouts.main')
@section('title', 'AUTOAVALUACIO')
@section('content')
<meta name="userId" content="{{Auth::user()->id}}">
<meta name="modulId" content="{{Auth::user()->modul->first->id}}">

    <div id="autoavaluacio"> 
       <autoavaluacioAlumnes> </autoavaluacioAlumnes>
     </div> 
@endsection