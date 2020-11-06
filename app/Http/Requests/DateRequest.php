<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class DateRequest extends RequestAbstract
{
    private const date_validation_parameter = 'required|date_format:' . \DateTime::ATOM;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'start' => self::date_validation_parameter,
            'end' => self::date_validation_parameter,
        ];
    }
}
