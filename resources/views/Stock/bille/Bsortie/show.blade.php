@extends('layouts.master')
@section('content')
    <h1 style="text-align: center"> Bon De  Sortie </h1>
     <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    <div class="group-list" style="border:1px solid black ; padding: 20px; " >
        <table>
            
        <tr > <td colspan="2"> <h3> Demande Reap : </h3> </td>  <td> <a href="/demandereap/{{$sortie->demande_reap_id}}"> {{$sortie->demande_reap_id}} </a></td></tr>
        <tr> <td colspan="2"> <h3> Reference : </h3> </td><td> {{$sortie->reference}} </td> </tr>
        <tr> <td colspan="2"> <h3> Date : </h3> </td> <td> {{$sortie->date}} </td> </tr>

    
    </table>

    </div>
        </div>
@endsection