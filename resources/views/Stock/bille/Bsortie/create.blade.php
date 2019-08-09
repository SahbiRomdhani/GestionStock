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
        <button class="btn btn-success btn-sm " type="button" onclick="get_produits()" >
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
                <tfoot id="footermodal" > 
                    <tr >
                        <td colspan="2"> Quantite Sortie :  </td>
                        <td ><output id="quantite"> </output> </td>
                    </tr>
                    <tr>
                        <td colspan="2"> Quantite Demander :  </td>
                        <td ><output id="quantite_demander"> </output> </td>
                    </tr>
                    <tr> <p id="erreur" style="color:red"> </p> </tr>
                    
                </tfoot>


            </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-info"  onclick="addRow()">Ajouter</button>
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
   
        $('#produitmodal').append("<tr data-idtable='"+v.produit_id+"' data-idproduit='"+v.id+"' ><td id='produit'>"+ v.designation +"</td><td id='quantite_actuel'>"+ v.quantite_actuel +"</td><td id='prix'>"+ v.prix_unitaire +"</td><td><input type='number' class='form-control sortie' name='sortie' id='sortie' onKeyUp='if(this.value>"+v.quantite_actuel +"){this.value="+v.quantite_actuel +";}' ></td></tr>");

        })
        $('#quantite_demander').text(quantite);
        $('#quantite').text(total);

      }
  
})
$('#produitmodal').empty();

$('#erreur').empty();



}
//-------------------------------Ajouter de model au tableau -----------------------------
function addRow() {
  var somme = $('#quantite').val();
  var demande = $('#quantite_demander').val();

  //console.log(demande);
  //console.log(somme);
  if ( somme > demande) {
  var erreur = 'La Quantite de Sortie dépasse La quantite Demander';
  $('#erreur').text(erreur);
  
  }
  else{
  var t = '';
  //console.log($somme);
  $i = 0;
  $pr = [];
  $('#produitmodal tr').each(function () { //parcourt for tr table
    $element = {} ;
      $element.idproduit =$(this).data('idtable'); 
      $element.idstock = $(this).data('idproduit');
      $element.produit = $(this).find('#produit').text(); //set value for first td in table for id_teacher
      $element.quantite = $(this).find('#quantite_actuel').text();
      $element.prix= $(this).find('#prix').text();
      $element.sortie = $(this).find('#sortie').val();
      $pr[$i]=$element;
      //if exist fill in table
      $i++;
      if ($element.sortie != 0) {
      var tr = "<tr data-idtable='"+$element.idproduit+"' data-idproduit='"+$element.idstock+"'><td>"+ $element.produit +"</td><td id='quantite_actuel'>"+ $element.quantite +"</td><td id='prix'>"+ $element.prix +"</td><td name='sortie' id='sortie'>"+$element.sortie+"</td></tr>";
      t = t+tr;
          }
})
 var table ="<table id='table"+$element.produit_id+"' style='background-color:#02eefa;' class='table'> <thead> <tr> <th> Produits</th> <th> Quantite</th><th> Prix </th> <th> Quantite Sortie</th> <th onclick='remove("+$element.produit_id+")'> <i style='font-size:2em;color:red' class='fas fa-ban'></i> </th></tr></thead>"
            +"<tbody id='getproduits' >"+t+" </tbody>"
            +"<tfoot> <tr><td colspan='2'> Quantite Demander : </td> <td ><output> "+ somme +" </output> </td> </tr> </tfoot></table>";
      $('#produitsortie'+$element.idproduit+'').append(table);

      }
          
}

//---------------------------------------------------------------------
function remove($id) {
  
  $('#table'+$id).remove();
  
}
//-------------------------------------------
function get_produits() {
   $('#getproduits tr').each(function () { //parcourt for tr table
    $element = {} ;
      $element.idproduit =$(this).data('idtable'); 

      $element.stock_id = $(this).data('idproduit');
      $element.produit = $(this).find("td:eq(0)").text(); 
      $element.quantite = $(this).find("td:eq(1)").text();
      $element.prix= $(this).find("td:eq(2)").text();
      $element.sortie =$(this).find("td:eq(3)").text();
      //if( $element.sortie != 0){
      //console.log($element.sortie);
      $pr[$i]=$element;
      //}
      $i++; 
});
console.log($pr) ;

}
//---------------------------Store ---------------------------------------
function newstore()
{
        var formData  = new FormData();
        $token = "{{ csrf_token() }}" ;
        formData.append('magasin', $('#magasin...').val());
        formData.append('demande', $('#demande').val());
        formData.append('date', $('#date').val());
        formData.append('reference', $('#reference').val());

        formData.append('products',JSON.stringify(get_produits()));
        formData.append('_token', $token);
         console.log(formData);
        $.ajax({
            type : 'POST',
            url :"{{route('store.sortie')}}",
            dataType :'json',
            data:formData,
            contentType: false,
            processData:false,

            headers: {'X-CSRF-TOKEN':$token},
        success: function(result)
        {

        console.log(result);
        location.reload();

        },
        error:function(){
         alert( 'Error ...');
        }
        })
    
}



</script>
@endsection