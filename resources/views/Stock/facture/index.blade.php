@extends('layouts.master')
@section('content')
    <h1>Livraison Facture </h1>


    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
        <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('facture.create')}}">Add Facture Livraison</a>

    
        <table class="table table-striped">
            <tr>
                <th>Demande Achat </th>
                <th>Reference</th>
                
                <th>Fournisseur</th>
                <th>Action</th>
            </tr>
            @if (count($factures)>0)
            @foreach ($factures as $facture)
            <tr>
                <td><a href="achat/{{$facture->demande_achat_id}}"> {{$facture->demande_achat_id}} </td>
                <td>{{$facture->reference}}</td>
                <td>{{$facture->Fournisseur->nom_fournisseur}}</td>
                <td>
                {!! Form::open(['action' => ['LivraisonFactureController@destroy', $facture->id], 'method'=> 'POST']) !!}
                @method('DELETE')
                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            @else 
            Data Not Found
                
            @endif
        </table>
    </div>
@endsection