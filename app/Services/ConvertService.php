<?php

namespace App\Services;

use App\Http\Requests\DateRequest;

class ConvertService
{
    public function diffInDays(DateRequest $request)
    {
        return $this->convert_format(
            $request->convert,
            $request->end->diffInDays($request->start)
        );
    }

    public function diffInWeekDays(DateRequest $request)
    {
        return $this->convert_format(
            $request->convert,
            $request->end->diffInWeekdays($request->start)
        );
    }

    public function diffInWeeks(DateRequest $request)
    {
        $result = $request->end->diffInWeeks($request->start);

        if ($to_format = $request->convert) {
            $result = $this->convert_format(
                $to_format,
                $request->end->diffInWeeks($request->start) * 7
            );
        }

        return $result;
    }

    /**
     * Formats number of days into any one of seconds, minutes, hours or years.
     *
     * @param string|null $to_format string takes one of s, m, h, y as input
     * @param int $days The number of days which is converted to the requested format
     * @return float|int
     */
    private function convert_format(?string $to_format, int $days)
    {
        switch ($to_format) {
            case 'h': {
                    return $days * 24;
                }
            case 'm': {
                    return $days * 24 * 60;
                }
            case 's': {
                    return $days * 24 * 60 * 60;
                }
            case 'y': {
                    return (int)$days / 365;
                }
            default: {
                    return $days;
                }
        }
    }
}
