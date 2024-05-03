@extends('layouts.main')
@section('title', 'AUTOAVALUACIOPROFE')
@section('content')
<meta name="userId" content="{{Auth::user()->id}}">
<meta name="modulId" content="{{Auth::user()->modul->first->id}}">

    <div id="autoavaluacio"> 
       <autoavaluacioProfe> </autoavaluacioProfe>
     </div> 
@endsection