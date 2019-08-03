@extends('layouts.master')

@section('content')
        <h1 style="text-align: center">Dashbord </h1>

        <div class="images">
        <div class="achat-img">
        <div class="text">
        <p >Produit Demande achat</p>
        <p>vous avez {{$achat}} produit demande Achat</p>
        <a href="{{route('produitachat.index')}}" class="btn btn-info"> Produit Achat</a>

        </div>
        </div>

        <div class="achat-img1">
        <div class="text">
        <p >Produit Stock</p>
        <p>vous avez {{$stock}} produit </p>
        <a href="{{route('produitstock.index')}}" class="btn btn-info"> Produit Stock</a>

        </div>
        </div>

         <div class="achat-img2">
        <div class="text">
        <p >Produit Reap</p>
        <p>vous avez {{$reap}} produit reap </p>
        <a href="{{route('produitreap.index')}}" class="btn btn-info"> Produit Reap</a>

        </div>
        </div>




</div>
@endsection
