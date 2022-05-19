<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomStoreRequest extends FormRequest
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
            'name'        => 'required|max:255', 
            'description' => 'required|max:1000', 
            'room_type'   => 'required', 
            'room_fee'    => 'required', 
            'image'       => 'required|mimes:jpeg,jpg,png', 
        ];
    }

      /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'Pole nazwa jest wymagane',    
            'description.required'  => 'Pole opis jest wymagane',    
            'room_type.required'    => 'Pole rodzaj Pokoju jest wymagane',    
            'room_fee.required'     => 'Pole cena jest wymagane',    
            'image.required'        => 'Pole zdjęcia jest wymagane',    
        ];
    }
}
