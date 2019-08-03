@extends('layouts.master')
@section('content')
<div class="container">

<h1>Update Produits</h1>
{!! Form::open(['action' => ['ProduitController@update',$produit->id], 'method'=> 'PUT']) !!}
   
    <div class="form-group">
       {{Form::label('designation', 'Designation')}}
       {{Form::text('designation', $produit->designation,['class'=>'form-control', 'placeholder'=>'Designation'])}}
    </div>
    <div class="form-group">
        {{Form::label('categorie_id', 'Categorie')}}
        {{Form::select('categorie_id',[''=>'selectionner une Catégorie'] + $categorie,NULL,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('fournisseur_id', 'Fournisseur')}}
            {{Form::select('fournisseur_id',[''=>'selectionner Fournisseur'] + $fournisseur,NULL,['class'=>'form-control'])}}
        </div>
    <div class="form-group">
            {{Form::label('code', 'Code barre')}}
            {{Form::text('code_barre', $produit->code_barre,['class'=>'form-control','placeholder'=>' Code barre'])}}
         </div>
    <div class="form-group">
        {{Form::label('unite', 'Unite')}}
        {{Form::text('unite',$produit->unite, ['class'=>'form-control', 'placeholder'=>'Unite'])}}
    </div>
    <div class="form-group">
        {{Form::label('min_stock', 'Minimum du Stock')}}
        {{Form::text('min_stock',$produit->min_stock, ['class'=>'form-control', 'placeholder'=>'Minimum du Stock'])}}
    </div>
    <div class="form-group">
        {{Form::label('max_stock', 'Maximum du Stock')}}
        {{Form::text('max_stock',$produit->max_stock, ['class'=>'form-control', 'placeholder'=>'Maximum du Stock'])}}
    </div>
   
    
    {{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}


</div>
@endsection