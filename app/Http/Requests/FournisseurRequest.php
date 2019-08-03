<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom_fournisseur' => 'required',
            'email' => 'required|email',
            'mat_fiscal' => 'required',
            'adresse' => 'required',
            'telephone' => 'required|regex:/[0-9]{8}/',
            'fax' => 'required|regex:/[0-9]{8}/',
            'site_web' => 'required',
            'tel_contact' => 'required|regex:/[0-9]{8}/',
            'nom_contact' => 'required',
            'email_contact' => 'required|email',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'regex' => 'Erreur !! entrer 8 nombre ',
            'required' => 'Erreur !! le champ est vide',
            'email'=> 'Erreur !! invalide email format',
        ];
    }
}
