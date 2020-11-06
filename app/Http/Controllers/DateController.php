<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateRequest;
use App\Services\ConvertService;
use Illuminate\Http\JsonResponse;

class DateController extends Controller
{
    private ConvertService $service;

    public function __construct(ConvertService $service)
    {
        $this->service = $service;
    }

    /**
     * Get the number of days between two datetime parameters.
     *
     * @param DateRequest $request
     * @return JsonResponse
     */
    public function days(DateRequest $request): JsonResponse
    {
        $result = $this->service->diffInDays($request);

        return response()->json($result);
    }

    /**
     * Get the number of weekdays between two datetime parameters.
     *
     * @param DateRequest $request
     * @return JsonResponse
     */
    public function weekdays(DateRequest $request): JsonResponse
    {
        $result = $this->service->diffInWeekDays($request);

        return response()->json($result);
    }

    /**
     * Get the number of complete weeks between two datetime parameters.
     *
     * @param DateRequest $request
     * @return JsonResponse
     */
    public function weeks(DateRequest $request): JsonResponse
    {
        $result = $this->service->diffInWeeks($request);

        return response()->json($result);
    }
}
