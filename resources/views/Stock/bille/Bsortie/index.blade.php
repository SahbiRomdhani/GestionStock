@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">Bon De  Sortie</h1>


<div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{route('bsortie.create')}}">Ajouter Bon de Sortie</a>

    
        <table class="table table-striped">
            <tr>
                <th>Demande Reap </th>
                <th>Reference</th>
                <th>Date</th>

            </tr>
            @if (count($bsortie)>0)
             @foreach ($bsortie as $sortie)
       
            <tr>
                <td><a href="/demandereap/{{$sortie->demande_reap_id}}">{{$sortie->demande_reap_id}}</a></td>
                <td>{{$sortie->reference}}</td>
                <td>{{$sortie->date}}</td>

            </tr>
             @endforeach  
             @else 
             Tableau est Vide
             @endif
        </table>
        {{$bsortie->links()}}

    </div>
        </div>
</div>
@endsection