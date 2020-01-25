@extends('layouts.master')
@section('content')

        <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >






<h1 style="text-align: center">Ajouter une Magasin</h1>
{!! Form::open(['action' => 'MagasinController@store', 'method'=> 'POST']) !!}
   
    <div class="form-group {{ $errors->has('nom_magasin') ? 'has-error': ''}}">
       {{Form::label('nom_magasin', 'Nom Magasin',['class'=>'control-label'])}}
       {{Form::text('nom_magasin', '',['class'=>'form-control', 'placeholder'=>'Nom magasin'])}}
       @if ($errors->has('nom_magasin'))
            <span class="help-block">
                {{$errors->first('nom_magasin')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('adresse') ? 'has-error': ''}}">
        {{Form::label('adresse', 'Adresse'),['class'=>'control-label']}}
        {{Form::text('adresse', '',['class'=>'form-control','placeholder'=>' Adresse'])}}
        @if ($errors->has('adresse'))
            <span class="help-block">
                {{$errors->first('adresse')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('categorie') ? 'has-error': ''}}">
        {{Form::label('categorie', 'Categorie'),['class'=>'control-label']}}
        {!!Form::select('categorie',array('Nouveau'=>'Nouveau', 'Occasion'=> 'Occasion'),'',['class'=>'form-control'])!!}
          @if ($errors->has('categorie'))
            <span class="help-block">
                {{$errors->first('categorie')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('telephone') ? 'has-error': ''}}">
        {{Form::label('telephone', 'telephone'),['class'=>'control-label']}}
        {{Form::text('telephone', '',['class'=>'form-control','placeholder'=>'XX XXX XXX'])}}
          @if ($errors->has('telephone'))
            <span class="help-block">
                {{$errors->first('telephone')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('type') ? 'has-error': ''}}">
        {{Form::label('type', 'Type'),['class'=>'control-label']}}
        {!!Form::select('type',array('Principale'=>'Principale', 'secondaire'=> 'secondaire'),'',['class'=>'form-control'])!!}
          @if ($errors->has('type'))
            <span class="help-block">
                {{$errors->first('type')}}

            </span>
        @endif
    </div>
   
   
    
    {{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}

          
        </div>
        </div>

@endsection