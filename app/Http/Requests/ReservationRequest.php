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
            'first_name.required' => 'Firstname is required',
            'last_name.required' => 'Lastname is required',
            'email.required' => 'E-mail is required',
            'email.email' => 'E-mail is not valid address email',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
            'phone.required' => 'Phone is required',
            'date_in.required' => 'Date in is required',
            'date_in.date' => 'Date in invalid format',
            'date_in.after' => 'Date in must by after today',
            'date_off.required' => 'Date in is required',
            'date_off.date' => 'Date off invalid format',
            'date_off.after_or_equal' => 'Date off must be after date in',
        ];
    }
}
