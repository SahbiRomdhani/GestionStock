@extends('layouts.app')
@section('content')
@include('ajax.modal')
<div onload="showCustomer()">
<button class="btn btn-info" data-toggle="modal" data-target="#myModal"> Add Product</button>

<button id="read-data" class="btn btn-info float-right btn-xs" onclick="showCustomer()">Load Data By Ajax</button>
<div class="panel-body">
    <table class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                
                <th>email</th>
                <th>Password</th>
                <th> Action </th>

            </tr>
        </thead>
        <tbody id="prod-info">

        </tbody>
    </table>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$.ajaxSetup({
    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

//--------------------Read Ajax---------------------------------
    function showCustomer(){

        $.get("{{ URL::to('ajax/read/') }}",function(data){

            $('#prod-info').empty();
            $.each(data,function(i,value){
                var tr =$('<tr/>');
                    
                tr.append($("<td/>",{
                    text : value.id
                })).append($("<td/>",{
                    text:value.name
                })).append($("<td/>",{
                    text:value.email
                })).append($("<td/>",{
                    text:value.password
                })).append($("<td/>",{
                    html : '<a href="" class="btn btn-info btn-xs" id="view" data-id="'+ value.id +'"> View</a>'+
                    '<a href="" class="btn btn-info btn-xs" id="edit" data-id="'+ value.id +'"> Edit</a>'+
                    '<a href="" class="btn btn-info btn-xs" id="delete" data-id="'+ value.id +'"> Delete </a>'
                }))
                $('#prod-info').append(tr);
            });
        })
    }
//------------------- Add Ajax ---------------
    $('#form-insert').on('submit',function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
            type : post,
            url : url,
            data : data,
            dataType : 'json',
            success:function(data){
                var tr =$('<tr/>',{
                    id:data.id
                });
                tr.append($("<td/>",{
                    text : data.id
                })).append($("<td/>",{
                    text: data.name
                })).append($("<td/>",{
                    text: data.email
                })).append($("<td/>",{
                    text: data.password
                })).append($("<td/>",{
                    html : '<a href="" class="btn btn-info btn-xs" id="view" data-id="'+ data.id +'"> View</a>'+
                    '<a href="" class="btn btn-info btn-xs" id="edit" data-id="'+ data.id +'"> Edit</a>'+
                    '<a href="" class="btn btn-info btn-xs" id="delete" data-id="'+ data.id +'"> Delete </a>'
                }))
                $('#prod-info').append(tr);
            }
        })
    })
    //------------------- Delete ---------------------
    $('body').delegate('#prod-info #delete','click',function(e){
        var id = $(this).data('id');
        $.post('{{ URL::to("/ajax/destroy")}}',{id:id},function(data) {
            $('tr#'+id).remove();
            
        })
    })
    //----------------------Edit---------------------------
    


</script>
@endsection