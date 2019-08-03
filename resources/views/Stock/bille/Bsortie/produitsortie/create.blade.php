@extends('layouts.master')
@section('content')

<h1> Bille Sortie </h1>
{!! Form::open(['action' => 'BsortieController@store', 'method'=> 'POST']) !!}
   
    
    <div class="form-group">
        {{Form::label( 'Bille Sortie')}}
        {{Form::select('b_sotrie_id',[''=>'selectionner Bille'] + $sortie,NULL,['class'=>'form-control'])}}

    </div>    
    <div class="form-group">
        {{Form::label('produit_stock_id', 'Produit Stock')}}
        {{Form::select('produit_stock_id',[''=>'selectionner Produit Stock'] + $stock,NULL,['class'=>'form-control'])}}
    </div>
        
    <div class="form-group">
       {{Form::label('quantite', 'Quantite')}}
       {{Form::text('quantite', '',['class'=>'form-control', 'placeholder'=>'Quantite'])}}
    </div>
   

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
    
@endsection