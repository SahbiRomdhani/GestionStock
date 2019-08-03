@extends('layouts.master')
@section('content')

<h1>Modifier Magasins</h1>
{!! Form::open(['action' => ['MagasinController@update',$magasin->id], 'method'=> 'PUT']) !!}
   
    <div class="form-group">
       {{Form::label('nom_magasin', 'Nom Magasin')}}
       {{Form::text('nom_magasin', $magasin->nom_magasin,['class'=>'form-control', 'placeholder'=>'Nom magasin'])}}
    </div>
    <div class="form-group">
        {{Form::label('adresse', 'Adresse')}}
        {{Form::text('adresse', $magasin->adresse,['class'=>'form-control','placeholder'=>' Adresse'])}}
    </div>
    <div class="form-group">
        {{Form::label('categorie', 'Categorie')}}
        {!!Form::select('categorie',array('Nouveau'=>'Nouveau', 'Occasion'=> 'Occasion'),'',['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {{Form::label('telephone', 'telephone')}}
        {{Form::text('telephone', $magasin->telephone,['class'=>'form-control','placeholder'=>' +216 XX XXX XXX'])}}
    </div>
    <div class="form-group">
        {{Form::label('type', 'Type')}}
        {!!Form::select('type',array('Principale'=>'Principale', 'secondaire'=> 'secondaire'),'',['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {{Form::label('user_id', 'User')}}
        {{Form::select('user_id',[''=>'selectionner user'] + $user,NULL,['class'=>'form-control'])}}
    </div>
    
   
    
    {{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection