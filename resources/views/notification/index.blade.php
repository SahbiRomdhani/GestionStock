@extends('layouts.master')
@section('content')
    <h1 style="text-align: center">  Notifications</h1>
  <div class="list-group">

    <!-- start notification -->
                    
    @foreach ($user->notifications as $notification)
                   
    
    <a href="/produitstock/{{$notification->data['produitstock_id']}}" class="list-group-item list-group-item-action"> 
     {{$notification->data['user_name']}}
     {{$notification->data['msg']}}
     {{$notification->data['magasin']}}
    </a>
    @endforeach 

    <!-- end notification -->
</div>
@endsection
