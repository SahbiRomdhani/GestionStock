@extends('layouts.master')
@section('content')
    <h1> Demande Achat </h1>
    <div class="group-list" style="border:1px solid black">
        <h3> Magasin : </h3> <p> {{$achat->magasin->nom_magasin}} </p> 
        <h3> Date : </h3> <p> {{$achat->date}} </p> 
        <h3> Etat : </h3> <p> {{$achat->etat}} </p> 

    </div>
@endsection