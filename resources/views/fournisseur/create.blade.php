@extends('layouts.master')
@section('content')

        <div class="row">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >

<h1 style="text-align: center">Ajouter un Fournisseur</h1>
{!! Form::open(['action' => 'FournisseurController@store', 'method'=> 'POST']) !!}
   
    <div class="form-group {{ $errors->has('nom_fournisseur') ? 'has-error': ''}}">
       {{Form::label('nom_fournisseur', 'Nom Fournisseur',['class'=>'control-label'])}}
       <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
        </div>
       {{Form::text('nom_fournisseur', '',['class'=>'form-control', 'placeholder'=>'Nom Fournisseur'])}}
       </div> 
       @if ($errors->has('nom_fournisseur'))
            <span class="help-block">
                {{$errors->first('nom_fournisseur')}}

            </span>
        @endif
</div>
    <div class="form-group {{ $errors->has('mat_fiscal') ? 'has-error': ''}}">
        {{Form::label('mat_fiscal', 'Fiscal',['class'=>'control-label'])}}
        <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
        </div>
        {{Form::text('mat_fiscal', '',['class'=>'form-control','placeholder'=>' Fiscal'])}}
        </div>
        @if ($errors->has('mat_fiscal'))
            <span class="help-block">
                {{$errors->first('mat_fiscal')}}

            </span>
        @endif
    </div>
     <!-- phone mask -->
                <div class="form-group  {{ $errors->has('telephone') ? 'has-error': ''}}">
                  <label class="control-label">Telephone</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="telephone" class="form-control" placeholder="telephone" data-inputmask='"mask": "(216) 99 999 999"' data-mask>
                  </div>
                  <!-- /.input group -->
                   @if ($errors->has('telephone'))
                <span class="help-block">
                {{$errors->first('telephone')}}

                    </span>
                    @endif
                </div>
                <!-- /.form group -->
 
   
    <div class="form-group {{ $errors->has('adresse') ? 'has-error': ''}}">
            {{Form::label('adresse', 'Adresse',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
        </div>
            {{Form::text('adresse', '',['class'=>'form-control','placeholder'=>' Adresse'])}}
            </div>
            @if ($errors->has('adresse'))
            <span class="help-block">
                {{$errors->first('adresse')}}

            </span>
        @endif
    </div>
    
    <div class="form-group {{ $errors->has('fax') ? 'has-error': ''}}">
            {{Form::label('fax', 'Fax',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
        </div>
            {{Form::text('fax', '',['class'=>'form-control','placeholder'=>' Fax'])}}
            </div>
            @if ($errors->has('fax'))
            <span class="help-block">
                {{$errors->first('fax')}}

            </span>
        @endif
    </div>
    
    <div class="form-group {{ $errors->has('email') ? 'has-error': ''}}">
            {{Form::label('email', 'E-Mail',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
        </div>
            {{Form::text('email', '',['class'=>'form-control','placeholder'=>' E-Mail'])}}
            </div>
            @if ($errors->has('email'))
            <span class="help-block">
                {{$errors->first('email')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('site_web') ? 'has-error': ''}}">
            {{Form::label('site_web', 'Site web',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-globe"></i></span>
        </div>
            {{Form::text('site_web', '',['class'=>'form-control','placeholder'=>'www.site.com'])}}
            </div>
            @if ($errors->has('site_web'))
            <span class="help-block">
                {{$errors->first('site_web')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('nom_contact') ? 'has-error': ''}}">
            {{Form::label('nom_contact', 'Nom Contact',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
        </div>
            {{Form::text('nom_contact', '',['class'=>'form-control','placeholder'=>'Nom Contact'])}}
            </div>
            @if ($errors->has('nom_contact'))
            <span class="help-block">
                {{$errors->first('nom_contact')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('tel_contact') ? 'has-error': ''}}">
            {{Form::label('tel_contact', 'Telephone Contact',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
        </div>
            {{Form::text('tel_contact', '',['class'=>'form-control','placeholder'=>'Telephone Contact'])}}
            </div>
            @if ($errors->has('tel_contact'))
            <span class="help-block">
                {{$errors->first('tel_contact')}}

            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email_contact') ? 'has-error': ''}}">
            {{Form::label('email_contact', 'E-mail Contact',['class'=>'control-label'])}}
            <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
        </div>
            {{Form::text('email_contact', '',['class'=>'form-control','placeholder'=>'E-mail Contact'])}}
            </div>
            @if ($errors->has('email_contact'))
            <span class="help-block">
                {{$errors->first('email_contact')}}

            </span>
        @endif
    </div>

{{Form::submit('submit',['class'=> 'btn btn-primary', 'style'=>'float: right;'])}}
{!! Form::close() !!}
        </div>
    </div>
@endsection