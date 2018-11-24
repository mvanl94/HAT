<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;

class WorkforceController extends Controller
{
    public function getAvailableEmployees(Request $request)
    {
        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];
        $data['module'] = $module;

        if (!(is_null($request->get('date')))) {

            $date = $request->get('date');
            $dagdeel = $request->get('dagdeel');

            $employees = Employee::where('beschikbaar_vanaf', '<', $date)
            ->where('beschikbaar_tot', '>', $date)
            ->get();

            $employees = $employees->filter(function ($item, $key) use($date, $dagdeel) {
                if ($item->isAvailable($date, $dagdeel)) {
                    return $item;
                }
            });

            $data['items'] = $employees;
            $data['date'] = $date;
        }
        return view('werknemers.beschikbaar')->with($data);

    }
}
