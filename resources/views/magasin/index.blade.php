@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Les Magasins</h1>


<div class="row">
    <div class="col-sm-1" ></div>
    <div class="col-sm-10" >

    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('magasin.create')}}">Ajouter Magasin</a>

        <table class="table table-striped">
            <tr>
                <th>Nom Magasin</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Categorie</th>
                <th>Type</th>
                <th>User</th>
                <th colspan="2" style="text-align: center">Action</th>
            </tr>
            @if (count($magasins)>0)
                
           
            @foreach ($magasins as $magasin)
                
            <tr>
                <td>{{$magasin->nom_magasin}}</td>
                <td>{{$magasin->adresse}}</td>
                <td>{{$magasin->telephone}}</td>
                <td>{{$magasin->categorie}}</td>
                <td>{{$magasin->type}}</td>
                <td>{{$magasin->user->name}}</td>
                <td><a class="btn btn-warning btn-sm"  href="magasin/{{$magasin->id}}/edit/"> <i class="fas fa-edit"></i> </a></td>
        
                <td>
                {!! Form::open(['action' => ['MagasinController@destroy', $magasin->id], 'method'=> 'POST']) !!}
                @method('DELETE')
                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            @else
            table magasin est vide

            @endif

        </table>
        {{$magasins->links()}}
    </div>
    </div>
</div>
@endsection