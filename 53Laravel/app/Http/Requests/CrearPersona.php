<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPersona extends FormRequest
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

        $fechaAfter = date('d-m-Y', strtotime('01-01-1910'));
        $fechaBefore = date('d-m-Y', strtotime(date('d-m-Y')));
        return [
            'names' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|email',
            'birthdate' => 'required|before:'. $fechaBefore .'|after:'. $fechaAfter,
            'photo' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'names.required' => 'El nombre es obligatorio.',
            'names.min' => 'El nombre debe contener al menos 3 (tres) caracteres.',
            'lastname.required' => 'El apellido es obligatorio.',
            'lastname.min' => 'El apellido debe contener al menos 3 (tres) caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser un correo electrónico válido.',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria.',
            'birthdate.before' => 'La fecha de nacimiento debe ser anterior a la fecha actual.',
            'birthdate.after' => 'La fecha de nacimiento debe ser posterior al 01/01/1910.',
            'photo.required' => 'La fotografía es obligatoria.',
            'photo.image' => 'El archivo debe tener la extensión jpeg, png, bmp, gif o svg.',
        ];
    }
}
