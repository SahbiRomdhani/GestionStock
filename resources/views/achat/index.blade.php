@extends('layouts.master')
@section('content')
    <h1>Les Demande Achat</h1>


    <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
            <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('achat.create')}}">Ajouter Demande Achat</a>

        <table class="table table-striped">
            <tr>
                <th>Magasin</th>
                <th>Date</th>
                <th>Etat</th>
                <th colspan="2" style="text-align: center">Action</th>

            </tr>
            @foreach ($achats as $achat)
                
            <tr>
                <td>{{$achat->magasin->nom_magasin}}</td>
                <td>{{$achat->date}}</td>
                <td>{{$achat->etat}}</td>

                <td>
                    <a class="btn btn-warning btn-sm"  href="achat/{{$achat->id}}/edit/"> 
                      <i class="fas fa-edit"></i>
                    </a>
                </td>

                <td>
                    {!! Form::open(['action' => ['AchatController@destroy', $achat->id], 'method'=> 'POST']) !!}
                    @method('DELETE')
                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                    {!! Form::close() !!}
                </td>
                
            </tr>
            @endforeach

        </table>
    </div>
@endsection