@extends('layouts.master')
@section('content')
    <h1> Demande Reap </h1>


    
    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('demandereap.create')}}">Create Reap</a>
    
        <table class="table table-striped">
            <tr>
                <th> Magasin</th>
                <th>Date </th>
                <th> Action</th>
            </tr>
            @if (count($reaps)>0)
            @foreach ($reaps as $reap)
            
            <tr>
                <td>{{ $reap->magasin->nom_magasin }}</td>
                <td>{{$reap->date}}</td>
                <td>
                    {!! Form::open(['action' => ['AchatController@destroy', $reap->id], 'method'=> 'POST']) !!}
                    @method('DELETE')
                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                    {!! Form::close() !!}
                </td>
                
            </tr>
            @endforeach
            @else Base Donnée est vide !! 

            @endif
        </table>
    </div>
@endsection