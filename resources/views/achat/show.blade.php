@extends('layouts.master')
@section('content')
    <h1 style="text-align: center"> Demande Achat </h1>
     <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    <div class="group-list" style="border:1px solid black ; padding: 20px; " >
        <table class="table">
            
        <tr > <td> <h3> Magasin : </h3> </td>  <td style="padding: 10px ; text-align: center"> {{$achat->magasin->nom_magasin}}</td></tr>
        <tr> <td> <h3> Date : </h3> </td><td> {{$achat->date}} </td> </tr>
        <tr> <td> <h3> Etat : </h3> </td> <td> {{$achat->etat}} </td> </tr>
        </table>

    </div>
        </div>
@endsection