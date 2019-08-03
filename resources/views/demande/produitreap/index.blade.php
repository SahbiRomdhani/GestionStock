@extends('layouts.master')
@section('content')
    <h1> Demande Produit Reap </h1>


    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
        <a class="btn btn-success" style="border:1px solid black ; float:right; " href="{{ route('demandereap.create')}}">Create Reap</a>

        <table class="table table-striped">
            <tr>
                <th>Demande Reap</th>
                <th>Produit</th>
                <th> Quantite </th>
                <th>Action</th>
            </tr>
            @if (count($produitreaps)>0)
            @foreach ($produitreaps as $produitreap)
            <tr>

                <td> {{$produitreap->reap->date}}</td>
                <td>{{$produitreap->produit->designation}}</td>
                <td> {{$produitreap->quantite}}</td>
                <td>
                    {!! Form::open(['action' => ['ProduitReapController@destroy', $produitreap->id], 'method'=> 'POST']) !!}
                    @method('DELETE')
                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                    {!! Form::close() !!}
                </td>
            </tr>
                
            @endforeach
            @else Base Donnée est vide
            @endif
        </table>
    </div>
@endsection