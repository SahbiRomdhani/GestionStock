@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">les Produits</h1>



<div class="row">
    <div class="col-sm-1" ></div>
    <div class="col-sm-10" >
    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('produit.create')}}">Create Produit</a>
            <a class="btn btn-success" style="border:1px solid black ; float: left; " href="{{ route('produitstock.index')}}">Stock Produit</a>
    
        <table class="table table-striped">
            <tr>
                <th>Designation</th>
                <th>Catégorie</th>
                <th>Code Barre</th>
                <th>unite</th>
                <th> min stock</th>
                <th> max stock</th>
                <th>Fournisseur</th>
                <th colspan="2" style="text-align: center"> Action</th>


            </tr>
            @if (count($produits)>0)
                
            @foreach ($produits as $produit)
                
            <tr>
                <td>{{$produit->designation}}</td>
                <td>{{$produit->categorie->categorie}}</td>
                <td>{{$produit->code_barre}}</td>
                <td>{{$produit->unite}}</td>
                <td>{{$produit->min_stock}}</td>
                <td>{{$produit->max_stock}}</td>
                <td>
                @foreach ($produit->fournisseur()->get() as $item)
                    
                {{$item->nom_fournisseur}} &nbsp;
                @endforeach
                </td>

                <td>
                <a class="btn btn-warning btn-sm" href="produit/{{$produit->id}}/edit/"><i class="fas fa-edit"></i> </a>
                </td>
                <td>
                {!! Form::open(['action' => ['ProduitController@destroy', $produit->id], 'method'=> 'POST']) !!}
                @method('DELETE')
                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
                </td>

            </tr>

            @endforeach
            @else
             <p>il n'a pas de Données</p>
            @endif


        </table>
        {{$produits->links()}}
    </div>
    </div>
</div>
@endsection