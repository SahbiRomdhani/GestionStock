@extends('layouts.master')
@section('content')
    <h1 style="text-align: center"> Demande Reap</h1>
     <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
    <div class="group-list" style="border:1px solid black ; padding: 20px; " >
    <table>
            
        <tr > <td colspan="2"> <h3> Magasin : </h3> </td>  <td> {{$reap->magasin->nom_magasin}}</td></tr>
        <tr> <td colspan="2"> <h3> Date : </h3> </td> <td> {{$reap->date}} </td> </tr>

    
    </table>

    </div>
        </div>
@endsection