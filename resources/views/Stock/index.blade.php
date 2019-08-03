@extends('layouts.master')
@section('content')
    <h1>Stock</h1>


    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; margin-left: 5px; " href="{{ route('bentree.create')}}">Billet Entree</a>
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('facture.create')}}">Livraison Facture</a>

        <table class="table table-striped">
            <tr>
            <th>Produit</th>
            
            <th>Magasin</th>
            
            <th>Quantite Initial</th>
            <th>Prix Unitaire</th>
            
            <th>Quantite Actuel</th>
            <th>Garantie</th>
            <th colspan="2" style="text-align: center">Action</th>
            </tr>
            @if (count($produits)>0)
            @foreach ($produits as $stock)
       
            <tr>
                <td>{{$stock->produit->designation}}</td>
                <td>{{$stock->magasin->nom_magasin}}</td>                
                <td>{{$stock->quantite_initial}}</td>
                <td>{{$stock->prix_unitaire}}dt</td>
                <td>{{$stock->quantite_actuel}}</td>
                <td>{{$stock->nbr_mois_garantie}} mois</td>
        
                <td>
                {!! Form::open(['action' => ['ProduitStockController@destroy', $stock->id], 'method'=> 'POST']) !!}
                @method('DELETE')
                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
                </td>

                
            </tr>
            @endforeach
            @else
           Stock est Vide
            @endif
        </table>

    </div>
@endsection