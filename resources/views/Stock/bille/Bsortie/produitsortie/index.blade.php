@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Produit Sortie</h1>

<div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    

    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{route('produitsortie.create')}}">Ajouter Bille</a>

    
        <table class="table table-striped">
            <tr>
                <th> Bille Sortie </th>
                <th> Produit Stock</th>
                <th>Quantite</th>
                
            </tr>
            <tbody>
                @if (count($produitsortie)>0)
                @foreach ($produitsortie as $item)
                <tr>
                    <td><a href="/bsortie/{{$item->b_sotrie_id}}"> {{$item->b_sotrie_id}}</a></td>
                    <td><a href="/produitstock/{{$item->produit_stock_id}}"> {{$item->produit_stock_id}}</a></td>
                    <td> {{$item->quantite}}</td>
                </tr>
                 @endforeach   
                @else 
                Tableau est vide !!
                @endif
                
            </tbody>
           
        </table>
        {{$produitsortie->links()}}

    </div>
        </div>
</div>
@endsection