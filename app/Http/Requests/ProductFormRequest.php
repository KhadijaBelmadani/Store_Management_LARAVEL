<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Id_Catégorie' =>['required','integer'],
            'Nom' =>['required','string'],
            'Slug' =>['required','string','max:255'],
            'Marque' =>['required','string'],
            'Description' =>['required','string'],
            'Prix_Original' =>['required','integer'],
            'Prix_vente' =>['required','integer'],
            'Quantité' =>['required','integer'],
            'Tendance' =>['nullable'],
            'Status' =>['nullable'],
            // 'Image'=>[' nullable','Image|mimes:,jpeg|png|jpg|'],

        ];
    }
}
