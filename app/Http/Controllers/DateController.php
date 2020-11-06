<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use \DateTime;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class DateController extends Controller
{
    private const date_validation_parameter = 'required|date_format:' . DateTime::ATOM;

    private const validation_parameters = [
        'start' => self::date_validation_parameter,
        'end' => self::date_validation_parameter,
    ];

    /**
     * Get the number of days between two datetime parameters.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function days(Request $request): JsonResponse
    {
        $this->validate($request, self::validation_parameters);

        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        return response()->json([
            $end->diffInDays($start)
        ]);
    }

    /**
     * Get the number of weekdays between two datetime parameters.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function weekdays(Request $request): JsonResponse
    {
        $this->validate($request, self::validation_parameters);

        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        return response()->json([
            $end->diffInWeekdays($start)
        ]);
    }

    /**
     * Get the number of complete weeks between two datetime parameters.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function weeks(Request $request): JsonResponse
    {
        $this->validate($request, self::validation_parameters);

        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        return response()->json([
            $end->diffInWeeks($start)
        ]);
    }
}
