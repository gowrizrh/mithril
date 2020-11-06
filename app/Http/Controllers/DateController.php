<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class DateController extends Controller
{

    /**
     * Get the number of days between two datetime parameters.
     *
     * @param DateRequest $request
     * @return JsonResponse
     */
    public function days(DateRequest $request): JsonResponse
    {
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        return response()->json([
            $end->diffInDays($start)
        ]);
    }

    /**
     * Get the number of weekdays between two datetime parameters.
     *
     * @param DateRequest $request
     * @return JsonResponse
     */
    public function weekdays(DateRequest $request): JsonResponse
    {
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        return response()->json([
            $end->diffInWeekdays($start)
        ]);
    }

    /**
     * Get the number of complete weeks between two datetime parameters.
     *
     * @param DateRequest $request
     * @return JsonResponse
     */
    public function weeks(DateRequest $request): JsonResponse
    {
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        return response()->json([
            $end->diffInWeeks($start)
        ]);
    }
}
