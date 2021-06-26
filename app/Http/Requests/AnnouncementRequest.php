<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (boolean)Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|max:100",
            "body" => "required|max:355",
            "category_id" => "required|exists:categories,id",
            "price" => 'required|numeric|max:9999999999999.99'
        ];
    }

    /* ------  ver resources/lang/[lang]/validation.php:custom
    public function messages(){
        
        return [
            'title.required' => 'El anuncio debe de tener un título',
            'body.required' => 'El cuerpo del anuncio no puede estar vacío',
            'category_id.required' => 'Selecciona una categoria',
            'category.exists:categories,id' => 'La categoria no existe',
            'price.required' => 'El precio no puede estar vacío, ponga un precio al artículo.'
        ];
    }
    */
}
