<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->post){
            $post_id = ',' . $this->post->id;
        } else {
            $post_id = '';
        }
        
        return [
            'title' => 'required|string|min:2|max:255',
            'body' => 'required|string|min:2|max:255',
            'active' => 'nullable|boolean',
            'slug' => 'required|string|min:2|max:255|unique:posts,slug' . $post_id,
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe ser una cadena de texto',
            'name.min' => 'El campo nombre debe contener al menos 2 caracteres',
            'name.max' => 'El campo nombre debe contener un maximo de 255 caracteres',
            
            'body.required' => 'El campo nombre es requerido',
            'body.string' => 'El campo nombre debe ser una cadena de texto',
            'body.min' => 'El campo nombre debe contener al menos 2 caracteres',
            'body.max' => 'El campo nombre debe contener un maximo de 255 caracteres',
            
            'category_id.required' => 'El campo categoria es requerido',
            'category_id.string' => 'El campo categoria debe ser una cadena de texto',
            'category_id.min' => 'El campo categoria debe contener al menos 2 caracteres',
            'category_id.max' => 'El campo categoria debe contener un maximo de 255 caracteres',
            'category_id.exists' => 'El campo categoria debe ser una opcion valida',

            'slug.required' => 'El campo slug es requerido',
            'slug.string' => 'El campo slug debe ser un texto',
            'slug.min' => 'El campo slug debe contener al menos 2 caracteres',
            'slug.max' => 'El campo slug debe contener un maximo de 255 caracteres',
            'slug.unique' => 'El campo slug ya existe en los registros',
        ];
    }
}
