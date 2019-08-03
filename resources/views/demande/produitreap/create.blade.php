@extends('layouts.master')
@section('content')

<h1>Ajouter Produit Reap</h1>
{!! Form::open(['action' => 'ProduitReapController@store', 'method'=> 'POST']) !!}
   
    
    <div class="form-group">
        {{Form::label('demande_reap_id', 'Demande Reap')}}
        {{Form::select('demande_reap_id',[''=>'selectionner une Demande'] + $demandereap,NULL,['class'=>'form-control'])}}
    </div>    
    <div class="form-group">
        {{Form::label('produit_id', 'Produit')}}
        {{Form::select('produit_id',[''=>'selectionner Produit'] + $produit,NULL,['class'=>'form-control'])}}
    </div>
        
    <div class="form-group">
       {{Form::label('quantite', 'Quantite')}}
       {{Form::text('quantite', '',['class'=>'form-control', 'placeholder'=>'Quantite'])}}
    </div>
   

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
    
@endsection