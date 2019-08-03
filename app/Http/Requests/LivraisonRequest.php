<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivraisonRequest extends FormRequest
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
            'demande_achat_id'=> 'required',
            'fournisseur_id'=>'required',
            'reference'=> 'required|numeric',
            'date'=>'required|date:dd-mm-yyyy'
        ];
    }
    public function messages()
    {
        return [
            'date' => 'Erreur !! invalide Format dd-mm-yyyy ',
            'required' => 'Erreur !! le champ est vide',
            'numeric' => 'Erreur !! Entrer un nombre',

        ];
    }
}
