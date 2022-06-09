<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationUpdateRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'date_start' => 'required|date|after:today',
            'date_end' => 'required|date|after_or_equal:date_start',
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
            'first_name.required' => 'Pole Imię jest wymagane',
            'first_name.string' => 'Pole Imię musi zawierać tylko litery',
            'last_name.required' => 'Pole Nazwisko jest wymagane',
            'last_name.string' => 'Pole Nazwisko musi zawierać tylko litery',
            'email.required' => 'Pole E-mail jest wymagane',
            'email.email' => 'Niepoprawny adres e-mail',
            'address.required' => 'Pole Adres jest wymagane',
            'city.required' => 'Pole Miastio jest wymagane',
            'phone.required' => 'Pole Telefon jest wymagane',
            'date_start.required' => 'Data dozpoczęcia jest wymagana',
            'date_start.date' => 'Niepoprawny format daty',
            'date_start.after' => 'Wprowadzona data musi być większa od dzisiejszej daty',
            'date_end.required' => 'Date zakończenia jest wymagana',
            'date_end.date' => 'Niepoprawny format daty',
            'date_end.after_or_equal' => 'Data zakończenia musi być poźniejsza od daty rozpoczęcia',
        ];
    }
}
