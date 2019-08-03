@extends('layouts.master')
@section('content')
    <h1>Les Fournisseurs</h1>

        <div style="overflow: auto;white-space: nowrap;" class="scrollmenu">
                <a class="btn btn-success" style="border:1px solid black ; float: right; " href="{{ route('fournisseur.create')}}">Ajouter Fournisseur</a>

        <table class="table table-striped" >
            <tr>
                <th>Nom Fournisseur</th>
                <th>Mat Fiscal</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Fax</th>
                <th>E-mail</th>
                <th>Site Web</th>
                <th>Nom Contact</th>
                <th>Telephone Contact</th>
                <th>Mail Contact</th>
                <th colspan="2" style="text-align: center">Action</th>

            </tr>
        <!-- Fetching Data -->
            @foreach ($fournisseurs as $fournisseur)
                
            
            <tr>
                <td>{{$fournisseur->nom_fournisseur}}</td>
                <td>{{$fournisseur->mat_fiscal}}</td>
                <td>{{$fournisseur->adresse}}</td>
                <td>{{$fournisseur->telephone}}</td>
                <td>{{$fournisseur->fax}}</td>
                <td>{{$fournisseur->email}}</td>
                <td>{{$fournisseur->site_web}}</td>
                <td>{{$fournisseur->nom_contact}}</td>
                <td>{{$fournisseur->tel_contact}}</td>
                <td>{{$fournisseur->email_contact}}</td>
                <!--Action-->
                <td> <a class="btn btn-warning btn-sm" href="fournisseur/{{$fournisseur->id}}/edit/"> <i class="fas fa-edit"></i> </a></td>
        
                <td>
                {!! Form::open(['action' => ['FournisseurController@destroy', $fournisseur->id], 'method'=> 'POST']) !!}
                @method('DELETE')
                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection