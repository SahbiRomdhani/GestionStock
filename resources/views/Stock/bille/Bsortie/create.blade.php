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
       <tfoot>
        <tr>
       <td colspan="3"></td>
        <td>
        <button class="btn btn-success btn-sm " type="button" >
          Créer </button>
           </td>
        </tr>
      </tfoot>
    </table>
</div>

    </div>
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
            <table class="table" id="table"> 
                <thead> 
                    <tr>
                    <th> Produits</th>
                    <th> Quantite</th>
                    <th> Prix </th>
                    <th> Quantite Sortie</th>
                    </tr>
                </thead>
                <tbody id="produitmodal">
                 
                </tbody>
                <tfoot > 
                    <tr >
                        <td colspan="2"> Quantite Sortie :  </td>
                        <td ><output id="quantite"> </output> </td>
                    </tr>
                    <tr>
                        <td colspan="2"> Quantite Demander :  </td>
                        <td ><output id="quantite_demander"> </output> </td>
                    </tr>
                    
                </tfoot>


            </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal" onclick="addRow()">Ajouter</button>
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
        $('#produitdemande').append("<tr id='"+v.id+"' ><td>"+ v.demande_reap_id +"</td><td>"+ v.designation +"</td><td>"+ v.quantite +"</td><td onclick='produitdemande("+v.id+","+v.quantite+")'><i data-toggle='modal' data-target='#myModal' id='button' style='font-size:2em;color:green' class='fas fa-cart-plus'></i></td></tr> <tr id='produitsortie"+v.id+"'></tr>");
        })
      },
      error:function(){
        alert('error..');
      }

    })
  })
 
//-----------------------Somme des Quantite Sortie --------------------------
$('#produitmodal').on('input','.sortie',function() {
  var total= 0;
  $('.sortie').each(function () {
    var sortie = $(this).val()-0;
    //console.log(sortie);
    total +=sortie
    //console.log(total);
    $('#quantite').text(total);

  });
})
//---------------------------------------------------
function produitdemande($id,$quantite) {
  var id  =$id;
  var quantite = $quantite;
  var total= 0;

    //console.log(id);

    $.ajax({
      url: "{{URL::route('prod.demandeReap') }}",
      data: {
        "id" : id,
        "_token": "{{ csrf_token() }}",
      },
      type: 'post',
      datatype: 'json',
      success: function(result){
        //console.log(result);
         $.each(result, function(k, v){
   
        $('#produitmodal').append("<tr data-idproduit='"+v.id+"' ><td id='produit'>"+ v.designation +"</td><td id='quantite_actuel'>"+ v.quantite_actuel +"</td><td id='prix'>"+ v.prix_unitaire +"</td><td><input type='number' class='form-control sortie' name='sortie' id='sortie' onKeyUp='if(this.value>"+v.quantite_actuel +"){this.value="+v.quantite_actuel +";}' ></td></tr>");

        })
        $('#quantite_demander').text(quantite);
        $('#quantite').text(total);

      }
  
})
$('#produitmodal').empty();


}
//-------------------------------Ajouter de model au tableau -----------------------------
function addRow() {
  $somme = $('#quantite').val();
  var t = '';

  //console.log($somme);
  $i = 0;
  $pr = [];
  $('#produitmodal tr').each(function () { //parcourt for tr table
    $element = {} ;
      $element.produit_id = $(this).data('idproduit');
      $element.produit = $(this).find('#produit').text(); //set value for first td in table for id_teacher
      $element.quantite = $(this).find('#quantite_actuel').text();
      $element.prix= $(this).find('#prix').text();
      $element.sortie = $(this).find('#sortie').val();
      $pr[$i]=$element;
      //if exist fill in table
      $i++;
          if ($element.sortie != 0) {

      var tr = "<tr id='"+$element.produit_id+"'><td id='produit'>"+ $element.produit +"</td><td id='quantite_actuel'>"+ $element.quantite +"</td><td id='prix'>"+ $element.prix +"</td><td name='sortie' id='sortie'>"+$element.sortie+"</td></tr>";
      t = t+tr;
          }
})
 var table ="<table id='"+$element.produit_id+"' style='background-color:#02eefa;' class='table'> <thead> <tr> <th> Produits</th> <th> Quantite</th><th> Prix </th> <th> Quantite Sortie</th> <th onclick='remove("+$element.produit_id+")'> <i style='font-size:2em;color:red' class='fas fa-ban'></i> </th></tr></thead>"
            +"<tbody >"+t+" </tbody>"
            +"<tfoot> <tr><td colspan='2'> Quantite Demander : </td> <td ><output> "+ $somme +" </output> </td> </tr> </tfoot></table>";
      $('#produitsortie'+$element.produit_id+'').append(table);
          
    


}

//---------------------------------------------------------------------
function remove($id) {
  
  $('#produitsortie'+$id).remove();
  
}





</script>
@endsection