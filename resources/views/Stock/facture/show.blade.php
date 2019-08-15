@extends('layouts.master')
@section('content')
    <h1 style="text-align: center"> Livraison Facture </h1>
     <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    <div class="group-list" style="border:1px solid black ; padding: 20px; " >
        <table>
            
        <tr > <td > <h2> Demande Achat : </h2> </td>  <td style="padding: 17px;"> <h4> <a href="/achat/{{$facture->demande_achat_id}}"> {{$facture->demande_achat_id}} </a></h4></td></tr>
        <tr> <td > <h2> Reference : </h2> </td><td><h5>{{$facture->reference}}</h5>  </td> </tr>
        <tr> <td > <h3> Fournisseur : </h3> </td> <td> <h4>{{$facture->fournisseur->nom_fournisseur}}</h4> </td> </tr>
        <tr> <td> <h3> Date : </h3> </td> <td> <h4> {{$facture->date}} </h4></td> </tr>

    
    </table>

    </div>
        </div>
@endsection