@extends('layouts.master')
@section('content')

<h1 style="text-align: center">Livraison Facture</h1>

        <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
   <table class="table table-borderd" >
       <thead> 
        <tr>
            <th> Demande Achat</th>

            <th> Fournisseur </th>
            <th> Reference </th>
            <th> Date</th> 
        </tr>

       </thead>
       <tbody>
    <td >
       <select class="form-control"  name="demande_achat_id" id="demande_achat_id"> 
           <option value="" > --- Select une Demande --- </option>
           @foreach ($achat as $key)
           <option value="{{$key->id}}"> {{$key->id}} </option>
               
           @endforeach
       </select>
    <td >
         <select class="form-control"  name="fournisseur_id" id="fournisseur_id"> 
           <option value="" > --- Select un Fournisseur --- </option>
           @foreach ($fournisseur as $key )
           <option value="{{$key->id}}"> {{$key->nom_fournisseur}} </option>
               
           @endforeach
       </select>
    </td>
    <td >
      <input type="text" class="form-control" name="reference" id="reference">
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
<h1 style="text-align: center">Stocker Les Produits</h1>
<br>
<div class="panel panel-footer">
    <table class="table table-borderd">
       <thead>
           <th>Magasin</th>
           <th> Categorie </th>
           <th>Produit</th>
           <th>Quantite</th>
           <th>Prix</th>
           <th>Garantie</th>
        
       </thead>
       <tbody>
           <tr id="clear">
            <input type="hidden" id="magasin_id" name="magasin[]" value="{{Auth()->user()->magasin['id']}}">
           <td> <input type="text"  class="form-control " name="magasin" value="{{Auth()->user()->magasin['nom_magasin']}}" id="magasin" disabled> </td>
            <td data-name="category"  name="category[]" >
                   <select class="form-control category"  name="category[]" id="id_category">
                   <option value="" selected Disabled>---Choisir une categorie---</option>

                    @foreach($categories as $category)
                   <option value="{{ $category->id}}">{{ $category->categorie}}</option>
                          @endforeach
                    </select>
            </td>
           <td> 
            <select class="form-control"   id="prod" > 
              <option value= "" selected disabled>---Choisir un produit---</option>  
            </select> 
            </td>
           <td> <input type="number"  class="form-control " id="quan" min="1"> </td>
           <td> <input type="number"  class="form-control "  id="pr" min="1"> </td>
           <td> <input type="number"  class="form-control" id="gar" min="1"> </td>
           <td  onclick="addRow()"><i style="font-size:2em;color:green" name="submit"   class="fas fa-plus-circle"></i></td>
           </tr>
        </tbody>
        
    
   </table>
</div>


   

   <table class="table table-striped table-bordred">
          <thead>
           <th>Produit</th>
           <th>Quantite</th>
           <th>Prix</th>
           <th>Garantie</th>
        
       </thead> 
       <tbody id="stock">
          

        
       </tbody>
       <tfoot>
        <tr>
            <td colspan="4" ></td> 
            <td onclick="newstore()">
            <input type="submit" value="submit" class="btn btn-info" >
            </td> 
        </tr>
       </tfoot>
   </table>


@endsection
@section('script')
<script> 
//function fill dependent select teacher from dynamic select institut
 $(document).on('change', '.category', function(){
    $('#prod').empty();
    var id  = $(this).val();
    //console.log(id);
    $.ajax({
      url: "{{URL::route('produitachat') }}",
      data: {
        "id" : id,
        "_token": "{{ csrf_token() }}",
      },
      type: 'post',
      datatype: 'json',
      success: function(result)
      {
        //console.log(result);
         $('#prod').append('<option value="" selected disabled>---Choisir un produit---</option>'); 
        $.each(result, function(k, v){
            
          if(check_product(v['id']) ){
            $('#prod').append('<option value= "' + v.id +'">' + v.designation +'</option>');
          }

        })
      },
      error:function(){
        alert('error..');
      }

    })
  })


//---------delete Row--------------
  function deleteRow($produit_id)
  {
    $('tr#'+$produit_id).remove();
   
    }


//-------------Add. Row-----------

function addRow() {
    $magasin_id= $('#magasin_id').val();
    $produit= $('#prod>option:selected').html();
    $produit_id=$('#prod').val();
    $quantite= $('#quan').val();
    $prix= $('#pr').val();
    $garantie= $('#gar').val();

    if($produit_id == null ){
        alert("Ereur !! veuiller selectionner un produit");
    } 
    else if( $quantite  <= 0) {
        alert("Ereur !! Quantite est vide ");
    }
    else if( $prix  <= 0) {
        alert("Ereur !! Prix est vide ");
    }
    else if( $garantie <= 0) {
        alert("Ereur !! Garantie est vide ");
    }
    else{
    $('#stock').append("<tr id='"+$produit_id+"'  data-idproduct = "+ $produit_id +" data-idmagasin = "+ $magasin_id +"><td>"+ $produit +"</td><td>"+ $quantite +"</td><td>"+ $prix +"</td><td>"+ $garantie +"</td><td><button class='btn btn-danger' onclick=deleteRow('"+$produit_id+"')><i class='fas fa-window-close'></i></button></td></tr>");
    document.getElementById('prod').value = '';
    document.getElementById('quan').value = '';
    document.getElementById('pr').value = '';
    document.getElementById('gar').value = '';
    document.getElementById('id_category').value = '';



    }

    
};
//--------------------delete Selected Item dropDown-------------------------
 
  function check_product($id) {
          $id = parseInt($id);
          $i = 0;
          $('#stock tr').each(function () { //parcourt for tr table
              $product =  $(this).data("idproduct"); //set value for first td in table for id_teacher
              if ($id == $product){ //verify if id equal ti id_teacher
                  $i++; //if exist fill in table
              }
          });
          if($i>0){
              return false ; // if filled in table remove from select teacher
          }else{
              return true ; // the select teacher not in select droplist
          }
      }
//---------------------Get produit From table--------------------------
 function get_products()
  {
   $i = 0;
    $pr = [];
    $('#stock tr').each(function () { //parcourt for tr table
        $element = {} ;
        $element.magasin= $(this).data("idmagasin");
        $element.produit= $(this).data("idproduct");
        $element.quantite= $(this).find("td:eq(1)").text();
        $element.prix =$(this).find("td:eq(2)").text();
        $element.garantie= $(this).find("td:eq(3)").text();

        $pr[$i]=$element;
        $i++; //if exist fill in table
    });
console.log(JSON.stringify($pr));
    return $pr;
  }


//----------------------- Store -----------------

function newstore()
{
        var formData  = new FormData();
        $token = "{{ csrf_token() }}" ;
        formData.append('demande_achat_id', $('#demande_achat_id').val());
        formData.append('fournisseur_id', $('#fournisseur_id').val());
        formData.append('date', $('#date').val());
        formData.append('reference', $('#reference').val());

        formData.append('products',JSON.stringify(get_products()));
        formData.append('_token', $token);

        $.ajax({
            type : 'POST',
            url :"{{route('livraion.stockproduit')}}",
            dataType :'json',
            data:formData,
            contentType: false,
            processData:false,

            headers: {'X-CSRF-TOKEN':$token},
        success: function(result)
        {

        console.log(result);
        location.reload();
        //document.location.href = result;

        },
        error:function(){
         alert( 'Error ...');
        }
        })
    
}


</script>
    
@endsection