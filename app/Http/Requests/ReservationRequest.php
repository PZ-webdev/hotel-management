<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'date_in' => 'required|date|after:today',
            'date_off' => 'required|date|after_or_equal:date_in',
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
            'last_name.required' => 'Pole Nazwisko jest wymagane',
            'email.required' => 'Pole E-mail jest wymagane',
            'email.email' => 'Niepoprawny adres e-mail',
            'address.required' => 'Pole Adres jest wymagane',
            'city.required' => 'Pole Miastio jest wymagane',
            'phone.required' => 'Pole Telefon jest wymagane',
            'date_in.required' => 'Data dozpoczęcia jest wymagana',
            'date_in.date' => 'Niepoprawny format daty',
            'date_in.after' => 'Wprowadzona data musi być większa od dzisiejszej daty',
            'date_off.required' => 'Date zakończenia jest wymagana',
            'date_off.date' => 'Niepoprawny format daty',
            'date_off.after_or_equal' => 'Data zakończenia musi być poźniejsza od daty rozpoczęcia',
        ];
    }
}
