@extends('layouts.master')
@section('content')

<h1>Update Demande Achat</h1>
{!! Form::open(['action' => ['AchatController@update',$achat->id], 'method'=> 'PUT']) !!}
   
    <div class="form-group">
        {{Form::label('magasin_id', 'Magasin')}}
        {{Form::select('magasin_id',[''=>'selectionner magasin'] + $magasin,NULL,['class'=>'form-control'])}}
    </div>
        
    <div class="form-group">
       {{Form::label('date', 'Date')}}
       {{Form::text('date', $achat->date,['class'=>'form-control', 'placeholder'=>'date'])}}
    </div>
    <div class="form-group">
        {{Form::label('etat', 'Etat')}}
        {!!Form::select('etat',array('terminer'=>'terminer', 'encours'=> 'encours','partielle'=>'partielle'),'',['class'=>'form-control'])!!}
    </div>

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection