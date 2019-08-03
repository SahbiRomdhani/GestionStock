@extends('layouts.master')
@section('content')

        <div class="row">
        <div class="col-sm-3" ></div>
        <div class="col-sm-6" >
<h1 style="text-align: center">Demande Achat</h1>

  
   
<div class="panel panel-footer">
    <table class="table table-borderd">
       <thead>
           <th>Magasin</th>
           <th>Date</th>
       </thead>
       <tbody>
           <td>
               <select name="magasin_id" class="form-control" id="magasin">
                   <option value="" selected disabled> --- Select Magasin --- </option>
                    @foreach($magasins as $magasin)
                    <option value="{{ $magasin->id}}">{{$magasin->nom_magasin}}</option>
                    @endforeach
                </select>
           </td>
           <td>     
            <input type="date" class="form-control" name="date">
            </td>
       </tbody>
    </table>
    </div>
</div>
    <div class="col-sm-3" ></div>



<table class="table table-borderd" id="tab_logic">
                         <thead>
                           <tr>
                             <th>Categorie</th>
                             <th>Produit</th>
                             <th>Fournisseur</th>
                             <th>Quantite</th>
                             <th> </th>
                           </tr>
                         </thead>
                         <tbody >
                           <tr>

                           <td width="25%" data-name="category" name="category[]" >
                              <select class="form-control category"  name="category[]" id="id_category">
                                <option value="" selected Disabled>---Choisir une categorie---</option>

                                @foreach($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->categorie}}</option>
                                @endforeach
                              </select>
                           </td>

                           <td width="25%" data-name="produits[]" name="produits[]">
                              <select class="form-control produits"  name="produits[]" id="products">

                              </select>
                           </td>
                           <td width="25%" name="fournisseurs[]" data-name="fournisseurs[]">
                              <select class="form-control" name="fournisseurs[]" id="fournisseur">

                              </select>
                           </td>
                           <td width="25%" data-name="quantites[]" name="quantites[]">
                               <input type="number" class="form-control" name="quantites[]" id="quantites"  min="1" >
                           </td>
                           <td>                         
                            <a id="add_row" class="btn btn-success ml-1" data-toggle="tooltip"><i class="fas fa-plus-circle" style="color: white;"></i>
                            </td>
                            </tr>
                        </tbody>
                      </table>
                   



                     <table class="table table-borderd" >
                       <thead>
                         <tr>
                           <th>Fournisseur</th>
                           <th>Produit</th>
                           <th>Quantite</th>
                         </tr>
                       </thead>
                       <tbody id="body">
                     
                      </tbody>
                      <tfoot>
                             <tr>
                        <td colspan="3"></td>
                        <td>
                            <button class="btn btn-success btn-sm " type="button" onclick="new_demande_achat()">
                            Créer</button>
                        </td>
                        </tr>
                      </tfoot>
                    </table>
    </div><!--card-->


    
@endsection
@section('script')
<script type="text/javascript">

  $(document).on('change', '.category', function(){
    $('#products').empty();
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
        console.log(result);
        $('#products').append('<option value= "">---Choisir un produit---</option>');
        $.each(result, function(k, v){
            
          if(check_product(v['id']) ){
            $('#products').append('<option value= "' + v.id +'">' + v.designation +'</option>');
          }

        })
      },
      error:function(){
        alert('error..');
      }

    })
  })


  $(document).on('change', '.produits', function(){
    $('#fournisseur').empty();
    var id  = $(this).val();
    $.ajax({
      url: "{{route('fournnisseurachat')}}",
      data: {
        "id" : id,
        "_token": "{{ csrf_token() }}",

      },
      type: 'post',
      datatype: 'json',
      success: function(result)
      {
        $.each(result, function(k, v){

          $('#fournisseur').append('<option value= "' + v.id +'">' + v.nom_fournisseur +'</option>');
        })
      },
      error:function(){
        alert('error..');
      }

    })
  })



  $('#add_row').click(function(){
    if($('#fournisseur>option:selected').val() && $('#quantites').val())
    {
      $id_fournisseur = $('#fournisseur>option:selected').val();
      $fournisseur = $('#fournisseur>option:selected').text();
      $id_product = $('#products>option:selected').val();
      $product = $('#products>option:selected').text();
      $quantite = $('#quantites').val();
      $('#body').append("<tr id='row_"+$id_product+"'  data-idproduct = "+ $id_product +" data-idfournisseur = "+ $id_fournisseur +"><td>"+ $fournisseur +"</td><td>"+ $product +"</td><td>"+ $quantite +"</td><td><button class='btn btn-danger' onclick=delete_tr('"+$id_product+"')><i class='fas fa-window-close'></i></button></td></tr>");

       $("#id_category").val($("#id_category option:first").val());
       $("#fournisseur").empty();
       $("#products").empty();
       $("#quantites").val('');
    }
    else {
      alert("veuillez remplire tous les champs");
    }

  })

  function delete_tr($products){
  $('#row_'+$products).remove();
  $("#id_category").val($("#id_category option:first").val());
  $("#fournisseur").empty();
  $("#products").empty();
  $("#quantites").val('');
  }

  function check_product($id) {
          $id = parseInt($id);
          $i = 0;
          $('#body tr').each(function () { //parcourt for tr table
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

  function get_products()
  {
   $i = 0;
    $pr = [];
    $('#body tr').each(function () { //parcourt for tr table
        $element = {} ;
        $element.id_product = $(this).data("idproduct"); //set value for first td in table for id_teacher
        $element.id_fournisseur = $(this).data("idfournisseur");
        $element.quantite= $(this).find("td:eq(2)").text();
        $pr[$i]=$element;
            $i++; //if exist fill in table
    });
    return $pr;
  }


function new_demande_achat()
{
  var formData  = new FormData();
  $token = "{{ csrf_token() }}" ;
  formData.append('id_magasin', $('#magasin').val());
  formData.append('date_demande_achat',$('#date').val());
  formData.append('products',JSON.stringify(get_products()));
  formData.append('_token', $token);

   $.ajax({
     url: "{{route('store.demande.achat')}}",
     data: formData,
     dataType: 'json',
     type: 'POST',
     contentType: false,
     processData:false,

    headers: {'X-CSRF-TOKEN':$token},
     success: function(result)
     {

        console.log(result);
        document.location.href = result;

     },
     error:function(){
       alert('error..');
     }

   })

}

</script>
    
@endsection