@extends('layouts.master')
@section('content')
    <h1 style="text-align: center"> Livraison Facture </h1>
     <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    <div class="group-list" style="border:1px solid black ; padding: 20px; " >
        <table>
            
        <tr > <td> <h3> Demande Achat : </h3> </td>  <td> <a href="/achat/{{$facture->demande_achat_id}}"> {{$facture->demande_achat_id}} </a></td></tr>
        <tr> <td> <h3> Reference : </h3> </td><td> {{$facture->reference}} </td> </tr>
        <tr> <td> <h3> Fournisseur : </h3> </td> <td> {{$facture->fournisseur->nom_fournisseur}} </td> </tr>
        <tr> <td> <h3> Date : </h3> </td> <td> {{$facture->date}} </td> </tr>

    
    </table>

    </div>
        </div>
@endsection