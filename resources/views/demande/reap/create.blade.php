@extends('layouts.master')
@section('content')

<h1>Demande Reap</h1>
{!! Form::open(['action' => 'DemandereapController@store', 'method'=> 'POST']) !!}
   
    
    <div class="form-group">
        {{Form::label('magasin_id', 'Magasin')}}
        {{Form::select('magasin_id',[''=>'selectionner magasin'] + $magasin,NULL,['class'=>'form-control'])}}
    </div>    
    
    <div class="form-group">
       {{Form::label('date', 'Date')}}
       {{Form::text('date', '',['class'=>'form-control', 'placeholder'=>'Date'])}}
    </div>
   

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
    
@endsection