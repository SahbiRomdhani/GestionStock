@extends('layouts.master')
@section('content')
    <h1>Produit Sortie</h1>


    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{route('produitsortie.create')}}">Ajouter Bille</a>

    
        <table class="table table-striped">
            <tr>
                <th> Bille Sortie </th>
                <th> Produit Stock</th>
                <th>Quantite</th>
                <th>Action</th>
                
            </tr>
           
        </table>
    </div>
@endsection