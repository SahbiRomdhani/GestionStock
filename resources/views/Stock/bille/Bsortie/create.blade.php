@extends('layouts.master')
@section('content')

<h1 style="text-align: center">Bon de Sortie</h1>

<div class="row">
<div class="col-sm-1" ></div>
<div class="col-sm-10" >
   <table class="table" >
       <thead> 
        <tr>
            <th> Magasin </th>

            <th> Demande </th>
            <th> Reference </th>
            <th> Date</th> 
        </tr>

       </thead>
       <tbody>
    <td >
       <select class="form-control magasin"  name="magasin" id="magasin"> 
           <option value="" disabled selected> --- Select une Magasin --- </option>
           @foreach ($magasin as $key)
           <option value="{{$key->id}}"> {{$key->nom_magasin}} </option>
               
           @endforeach
       </select>
    <td >
         <select class="form-control demande"  name="demande" id="demande"> 
           <option value="" disabled selected> --- Select une Demande --- </option>
           @foreach ($demandereap as $key )
           <option value="{{$key->id}}"> {{$key->nom_fournisseur}} </option>
               
           @endforeach
       </select>
    </td>
    <td >
      <input type="text" class="form-control" name="reference" id="reference" placeholder="Reference">
    </td>
    <td >
     <input type="date" class="form-control" name="date" id="date">  
    </td>
       </tbody>
   </table>
    </div>
</div>

<br>
<hr>
<br>
<h1 style="text-align: center"> Les Produits Demander</h1>
<br>
<div class="panel panel-footer">
    <table class="table table-borderd">
       <thead>
           <th>Demande Reap</th>
           <th>Designation </th>
           <th>Quantite</th>
           <th></th>
        
       </thead>
       <tbody id="produitdemande">
       </tbody>
    </table>
</div>



 <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Les Produits</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <table class="table"> 
                <thead> 
                    <tr>
                    <th> Produit Stock</th>
                    <th> Quantite</th>
                    <th> Prix </th>
                    <th> Quantite Sortie</th>
                    </tr>
                </thead>
                <tbody id="produitmodal">
                    @if (count($stocks)>0)
                    @foreach ($stocks as $stock) 
                    <tr>
                    <td>{{$stock->produit->designation}}</td>
                        <td>{{$stock->quantite_actuel}}</td>
                        <td>{{$stock->prix_unitaire}}</td>
                        <td><input type="number" class="form-control" name="quantite-sortie" id="quantite-sortie" ></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot> 
                    <tr >
                        <td colspan="2"> Quantite Demander :  </td>
                    </tr>
                    
                </tfoot>


            </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-info" >Ajouter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
<script> 
//-------------------- Select Demande selon magasin ------------------------------ 
$(document).on('change', '.magasin', function(){
    $('#demande').empty();
    var id  = $(this).val();
    //console.log(id);
    $.ajax({
      url: "{{URL::route('magasin.demande') }}",
      data: {
        "id" : id,
        "_token": "{{ csrf_token() }}",
      },
      type: 'post',
      datatype: 'json',
      success: function(result)
      {
        //console.log(result);
         $('#demande').append('<option value="" selected disabled>---Choisir une demande---</option>'); 
        $.each(result, function(k, v){
            
            $('#demande').append('<option value= "' + v.id +'">' + v.id +'</option>');
          

        })
      },
      error:function(){
        alert('error..');
      }

    })
  })

//----------------------------Select Produit Reap selon demande------------------------------------------------
$(document).on('change', '.demande', function(){
    var id  = $(this).val();
    //console.log(id);
    $.ajax({
      url: "{{URL::route('produit.demande.reap') }}",
      data: {
        "id" : id,
        "_token": "{{ csrf_token() }}",
      },
      type: 'post',
      datatype: 'json',
      success: function(result)
      {
        //console.log(result);
        $.each(result, function(k, v){
            
        
        $('#produitdemande').append("<tr id='"+v.id+"' ><td>"+ v.demande_reap_id +"</td><td>"+ v.designation +"</td><td>"+ v.quantite +"</td><td><i data-toggle='modal' data-target='#myModal' style='font-size:2em;color:green' class='fas fa-cart-plus'></i></td></tr>");
          

        })
      },
      error:function(){
        alert('error..');
      }

    })
  })

















</script>
@endsection