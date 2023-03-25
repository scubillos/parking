<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VehicleInUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            "schedule" => "in:day,morning,afternoon",
            "schedule_day" => "date|after:yesterday",
            "plat_number" => "regex:/(^[A-Z]{3,4}\d{2,3}$)/u|exists:vehicles,plat_number",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages() : array
    {
        return [
            'schedule.in'           => 'Solo se permite (day, morning, afternoon) para el horario',
            'schedule_day.date'     => 'La fecha no es válida',
            'schedule_day.after'    => 'La fecha no debe ser anterior al día de hoy',
            'plan_number.regex'     => 'El número de placa no tiene un formato válido',
            'plat_number.exists'    => 'El número de placa no es válido',
        ];
    }

    protected function failedValidation(Validator $validator) : HttpResponseException
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()
        ], 400));
    }
}
