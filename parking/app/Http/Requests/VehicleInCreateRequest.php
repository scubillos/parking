<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VehicleInCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            "location_id" =>"required",
            "schedule" => "required|in:day,morning,afternoon",
            "schedule_day" => "required|date",
            "plat_number" => "required|regex:/(^[A-Z]{3,4}\d{2,3}$)/u|exists:vehicles,plat_number",
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
            'location_id.required'  => 'La ubicación es obligatoria',
            'schedule.required'     => 'El horario es obligatorio',
            'schedule.in'           => 'Solo se permite (day, morning, afternoon) para el horario',
            'schedule_day.required' => 'La fecha es obligatoria',
            'schedule_day.date'     => 'La fecha no es válida',
            'plat_number.regex'     => 'El número de placa no tiene un formato válido',
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
