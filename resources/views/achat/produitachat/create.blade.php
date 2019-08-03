@extends('layouts.master')
@section('content')

<h1>Demande Achat Produit</h1>
{!! Form::open(['action' => 'ProduitDemandeAchatController@store', 'method'=> 'POST']) !!}
   
    
    <div class="form-group">
        {{Form::label('fournisseur_id', 'Fournisseur')}}
        {{Form::select('fournisseur_id',[''=>'selectionner magasin'] + $fournisseur,NULL,['class'=>'form-control'])}}
    </div>    
    
    <div class="form-group">
        {{Form::label('demande_achat_id', 'Date Demande Achat')}}
        {{Form::select('demande_achat_id',[''=>'selectionner magasin'] + $achat,NULL,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('produit_id', 'Produit')}}
        {{Form::select('produit_id',[''=>'selectionner magasin'] + $produit,NULL,['class'=>'form-control'])}}
    </div>
        
    <div class="form-group">
       {{Form::label('quantite', 'Quantite')}}
       {{Form::text('quantite', '',['class'=>'form-control', 'placeholder'=>'Quantite'])}}
    </div>
   

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
    
@endsection