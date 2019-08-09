@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Bon De Entree</h1>


<div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
        <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('bentree.create')}}">Ajouter Bon de Entree</a>

   
        <table class="table table-striped">
            <tr>
                <th> Bon de Sortie</th>
                <th> Magasin</th>
                <th> Date </th>
                <th> Action </th>
            </tr>
            <tr> 
            @if (count($entre)>0)
                    
            @foreach ($entre as $item)
                
            
            <td>{{$item->b_sortie_id}}</td>
            <td>{{$item->magasin->nom_magasin}}</td>
            <td>{{$item->date}}</td>

             <td>
                {!! Form::open(['action' => ['ProduitStockController@destroy', $item->id], 'method'=> 'POST']) !!}
                @method('DELETE')
                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
                </td>

            </tr>
            @endforeach
            @else 
            Il n y a pas de données
            @endif

            
        </table>
        {{$entre->links()}}

    </div>
        </div>
</div>
@endsection