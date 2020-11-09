<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use DateTime;
use Illuminate\Validation\Rule;
use Pearl\RequestValidate\RequestAbstract;

class DateRequest extends RequestAbstract
{
    private const date_validation_parameter = 'required|date_format:' . DateTime::ATOM;

    public Carbon $start;

    public Carbon $end;

    public ?string $convert;

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
            'format' => [
                'nullable',
                Rule::in(['s', 'm', 'h', 'y']),
            ]
        ];
    }

    /**
     * Initialise properties after validation is performed for convenience
     *
     * @param $validator
     */
    public function withValidator($validator)
    {
        if ($validator->passes()) {
            $this->start = Carbon::createFromFormat(DateTime::ATOM, $this->input('start'));
            $this->end = Carbon::createFromFormat(DateTime::ATOM, $this->input('end'));
            $this->convert = $this->input('format');
        }
    }
}
