@extends('layouts.master')
@section('content')

        <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >


<h1>Ajouter Un Produit</h1>
{!! Form::open(['action' => 'ProduitController@store', 'method'=> 'POST']) !!}
   
    <div class="form-group {{ $errors->has('designation') ? 'has-error': ''}}">
       {{Form::label('designation', 'Designation',['class'=>'control-label'])}}
       {{Form::text('designation', '',['class'=>'form-control', 'placeholder'=>'Designation'])}}
       @if ($errors->has('designation'))
            <span class="help-block">
                {{$errors->first('designation')}}

            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('categorie_id') ? 'has-error': ''}}">
        {{Form::label('categorie_id', 'Categorie',['class'=>'control-label'])}}
        {{Form::select('categorie_id',[''=>'selectionner une Catégorie'] + $categorie,NULL,['class'=>'form-control'])}}
          @if ($errors->has('categorie_id'))
            <span class="help-block">
                {{$errors->first('categorie_id')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('fournisseur_id') ? 'has-error': ''}}" >
            {{Form::label('', 'Fournisseur',['class'=>'control-label'])}} <br>
            
            <select class="form-control" id="nameid" name="fournisseur_id[]" multiple="multiple"> 
                @foreach ($fournisseur as $key => $four)
           
                <option value="{{$key}}"> {{$four}}</option>
                @endforeach
            </select>
          @if ($errors->has('fournisseur_id'))
            <span class="help-block">
                {{$errors->first('fournisseur_id')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('code_barre') ? 'has-error':''}}">
            {{Form::label('', 'Code barre',['class'=>'control-label'])}}
            {{Form::text('code_barre', '',['class'=>'form-control','placeholder'=>' Code barre','id'=>"code_barre"])}}
    
        @if ($errors->has('code_barre'))
            <span class="help-block">
                {{$errors->first('code_barre')}}

            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('unite') ? 'has-error': ''}}">
        {{Form::label('unite', 'Unite',['class'=>'control-label'])}}
        {!!Form::select('unite',array(''=>'Choisir une unite','kg'=>'kg', 'litre'=> 'litre'),'',['class'=>'form-control'])!!}

          @if ($errors->has('unite'))
            <span class="help-block">
                {{$errors->first('unite')}}

            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('min_stock') ? 'has-error': ''}}">
        {{Form::label('min_stock', 'Minimum du Stock',['class'=>'control-label'])}}
        {{Form::text('min_stock','', ['class'=>'form-control', 'placeholder'=>'Minimum du Stock'])}}
          @if ($errors->has('min_stock'))
            <span class="help-block">
                {{$errors->first('min_stock')}}

            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('max_stock') ? 'has-error': ''}}">
        {{Form::label('max_stock', 'Maximum du Stock',['class'=>'control-label'])}}
        {{Form::text('max_stock','', ['class'=>'form-control', 'placeholder'=>'Maximum du Stock'])}}
      @if ($errors->has('max_stock'))
            <span class="help-block">
                {{$errors->first('max_stock')}}

            </span>
        @endif
    </div>

   
    
    {{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}
        </div>
    </div>
    

@endsection
@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script> 
$("#nameid").select2({
    placeholder:'Select option',
    allowclear:true
});
</script>
    
@endsection