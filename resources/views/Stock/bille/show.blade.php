@extends('layouts.master')
@section('content')
    <h1 style="text-align: center"> Bon De  Entree </h1>
     <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    <div class="group-list" style="border:1px solid black ; padding: 20px; " >
        <table>
            
        <tr > <td > <h3> Bon De Sortie : </h3> </td>  <td> <a href="/bsortie/{{$entree->b_sortie_id}}"> {{$entree->b_sortie_id}} </a></td></tr>
        <tr> <td > <h3> Reference : </h3> </td><td> {{$entree->magasin->nom_magasin}} </td> </tr>
        <tr> <td > <h3> Date : </h3> </td> <td> {{$entree->date}} </td> </tr>

    
    </table>

    </div>
        </div>
@endsection