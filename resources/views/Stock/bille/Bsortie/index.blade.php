@extends('layouts.master')
@section('content')
    <h1>Bille Sortie</h1>


    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{route('bsortie.create')}}">Ajouter Billet</a>

    
        <table class="table table-striped">
            <tr>
                <th>Demande Reap </th>
                <th>Demande Maintenance</th>
                <th>Date</th>
                <th>Action</th>

            </tr>
            @if (count($bsortie)>0)
             @foreach ($bsortie as $sortie)
       
            <tr>
                <td>{{$sortie->demande_reap_id}}</td>
                <td>{{$sortie->demande_maintenance_id}}</td>
                <td>{{$sortie->date}}</td>

            </tr>
             @endforeach  
             @else 
             Table Vide
             @endif
        </table>
    </div>
@endsection