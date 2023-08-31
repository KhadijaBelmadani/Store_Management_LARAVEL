<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
            'Titre' =>['required','string','max:255' ],
            'Description' =>['required' ],
            'Image' =>['nullable','image',
                        'mimes:png,jpg,jpeg,webp'
                      ],
            'Status'=>['nullable']
        ];
    }
}
