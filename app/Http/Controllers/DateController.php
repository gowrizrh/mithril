<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DateTime;

class DateController extends Controller
{
    public function days(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|date_format:Y-m-d\TH:i:sO',
            'end' => 'required|date_format:Y-m-d\TH:i:sO',
        ]);

        $start = DateTime::createFromFormat(DateTime::ISO8601, $request->input('start'));
        $end = DateTime::createFromFormat(DateTime::ISO8601, $request->input(('end')));

        return response()->json([
            $start->format('Y-m-d'),
            $end->format('Y-m-d')
            ]
        );
    }

    public function weekdays()
    {
        return response()->json('weekdays');
    }

    public function weeks()
    {
        return response()->json('weeks');
    }

}
