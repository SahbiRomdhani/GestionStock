@extends('layouts.master')
@section('content')
    <h1>Stock</h1>


    
    <div style="overflow:auto; white-space:nowrap;" class="scrollmenu">
    
        <table class="table table-striped">
            <tr>
            <th>Bon De ID </th>
            <th>Produit</th>
            <th>Magasin</th>
            <th>Type </th>
            <th>Quantite Initial</th>
            <th>Prix Unitaire</th>
            
            <th>Quantite Actuel</th>
            <th>Garantie</th>
            <th colspan="2" style="text-align: center">Action</th>
            </tr>
            <tr>
                <td>
                    @if ($stock->bon_type == "Livraison")
                    <a href="/facture/{{$stock->bon_id}}"> {{$stock->bon_id}} </a>
                    @else 
                    <a href="/bentree/{{$stock->bon_id}}"> {{$stock->bon_id}} </a>
                    @endif
                    
                </td>
                
                <td>{{$stock->produit->designation}}</td>
                <td>{{$stock->magasin->nom_magasin}}</td> 
                <td>{{$stock->bon_type}}</td>
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
           
        </table>

    </div>
@endsection