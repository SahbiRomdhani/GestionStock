@extends('layouts.master')
@section('content')

<h1>Modifier un Fournisseur</h1>
{!! Form::open(['action' => ['FournisseurController@update',$fournisseur->id], 'method'=> 'PUT']) !!}
   
    <div class="form-group">
       {{Form::label('nom_fournisseur', 'Nom Fournisseur')}}
       {{Form::text('nom_fournisseur', $fournisseur->nom_fournisseur,['class'=>'form-control', 'placeholder'=>'Nom Fournisseur'])}}
    </div>
    <div class="form-group">
        {{Form::label('mat_fiscal', 'Fiscal')}}
        {{Form::text('mat_fiscal', $fournisseur->mat_fiscal,['class'=>'form-control','placeholder'=>' Fiscal'])}}
    </div>
 
    <div class="form-group">
        {{Form::label('telephone', 'telephone')}}
        {{Form::text('telephone', $fournisseur->telephone,['class'=>'form-control','placeholder'=>' +216 XX XXX XXX'])}}
    </div>
   
    <div class="form-group">
            {{Form::label('adresse', 'Adresse')}}
            {{Form::text('adresse', $fournisseur->adresse,['class'=>'form-control','placeholder'=>' Adresse'])}}
    </div>
    
    <div class="form-group">
            {{Form::label('fax', 'Fax')}}
            {{Form::text('fax', $fournisseur->fax,['class'=>'form-control','placeholder'=>' Fax'])}}
    </div>
    
    <div class="form-group">
            {{Form::label('email', 'E-Mail')}}
            {{Form::text('email', $fournisseur->email,['class'=>'form-control','placeholder'=>' E-Mail'])}}
    </div>
    <div class="form-group">
            {{Form::label('site_web', 'Site web')}}
            {{Form::text('site_web', $fournisseur->site_web,['class'=>'form-control','placeholder'=>'www.site.com'])}}
    </div>
    <div class="form-group">
            {{Form::label('nom_contact', 'Nom Contact')}}
            {{Form::text('nom_contact', $fournisseur->nom_contact,['class'=>'form-control','placeholder'=>'Contact'])}}
    </div>
    <div class="form-group">
            {{Form::label('tel_contact', 'Telephone Contact')}}
            {{Form::text('tel_contact', $fournisseur->tel_contact,['class'=>'form-control','placeholder'=>'Telephone Contact'])}}
    </div>
    <div class="form-group">
            {{Form::label('email_contact', 'E-mail Contact')}}
            {{Form::text('email_contact', $fournisseur->email_contact,['class'=>'form-control','placeholder'=>'E-mail Contact'])}}
    </div>

{{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection