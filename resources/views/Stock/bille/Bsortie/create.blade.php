@extends('layouts.master')
@section('content')

<h1> Bille Sortie </h1>
{!! Form::open(['action' => 'BsortieController@store', 'method'=> 'POST']) !!}
   
    
    <div class="form-group">
        {{Form::label('demande_reap_id', 'Demande Reap')}}
        {{Form::select('demande_reap_id',[''=>'selectionner Reap'] + $demandereap,NULL,['class'=>'form-control'])}}
    </div>    
    <div class="form-group">
        {{Form::label('demande_maintenance_id', 'Demande Maintenance')}}
        {{Form::select('demande_maintenance_id',[''=>'selectionner Demande maintenance'] + $maintenance,NULL,['class'=>'form-control'])}}
    </div>
        
    <div class="form-group">
       {{Form::label('date', 'Date')}}
       {{Form::text('date', '',['class'=>'form-control', 'placeholder'=>'Date'])}}
    </div>
   

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
    
@endsection