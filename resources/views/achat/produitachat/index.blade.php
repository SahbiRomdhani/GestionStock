@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Produit Demande Achat </h1>


   
<div class="row">
    <div class="col-sm-1" ></div>
    <div class="col-sm-10" > 
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">

        <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('achat.create')}}">Ajouter Demande Achat</a>

        <table class="table table-striped">
            <tr>
                <th>Demande Achat</th>
                <th>Produit</th>
                <th>Fournisseur</th>
                <th>Quantite</th>
                <th>Action</th>
            </tr>
            @if (count($produitachats)>0)
                @foreach ($produitachats as $produitachat)
      
            <tr>
                <td><a href="achat/{{$produitachat->demande_achat_id}}">{{$produitachat->demande_achat_id}} </a></td>
                <td>{{$produitachat->produit->designation}} </td>
                
                <td> {{$produitachat->fournisseur->nom_fournisseur}}</td>
                <td>{{$produitachat->quantite}} </td>

                 <td>
                    {!! Form::open(['action' => ['AchatController@destroy', $produitachat->id], 'method'=> 'POST']) !!}
                    @method('DELETE')
                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            @else
            table vide

            @endif


        </table>
        {{$produitachats->links()}}

    </div>
    </div>
</div>
@endsection