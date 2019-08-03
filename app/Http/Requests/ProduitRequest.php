<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'designation'=>'required',
            'categorie_id'=>'required',
            'fournisseur_id'=>'required',
            'code_barre'=>'required|numeric',
            'unite'=>'required',
            'min_stock'=>'required|numeric',
            'max_stock'=>'required|numeric',
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
            'numeric'=>'Erreur !! Entrer un nombre',
            'required'=> 'Erreur !! le champ est vide',
            
        ];
    }
}
