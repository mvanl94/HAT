<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];
        $data['module'] = $module;

        $employees = Employee::all();
        $data['datatable'] = $dataTable = 'inline';

        $data['employees'] = $employees;
        return view('werknemers.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];

        $data['module'] = $module;
        return view('werknemers.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $beschikbaarheid = collect([
            'Monday' => ["ochtend" => (is_null(request('Monday1')) ? 0 : 1),
            "middag" => (is_null(request('Monday2'))? 0 : 1)],
            'Tuesday' => ["ochtend" => (is_null(request('Tuesday1'))? 0 : 1),
            "middag" => (is_null(request('Tuesday2'))? 0 : 1)],
            'Wednesday' => ["ochtend" => (is_null(request('Wednesday1'))? 0 : 1),
            'middag' => (is_null(request('Wednesday2'))? 0 : 1)],
            'Thursday' => ["ochtend" => (is_null(request('Thursday1'))? 0 : 1),
            'middag' => (is_null(request('Thursday2'))? 0 : 1)],
            'Friday' => ["ochtend" => (is_null(request('Friday1'))? 0 : 1),
            'middag' => (is_null(request('Friday2'))? 0 : 1)]
        ]);


        Employee::create([
            'naam' => request('naam'),
            'adres' => request('adres'),
            'birthday' => request('birthday'),
            'postcode' => request('postcode'),
            'stad' => request('stad'),
            'telefoon' => request('telefoon'),
            'email' => request('email'),
            'ervaring' => request('ervaring'),
            'schaal' => request('schaal'),
            'salarisnummer' => request('salarisnummer'),
            'periodiek' => request('periodiek'),
            'systeem' => implode(',', request('systeem')),
            'beschikbaar_vanaf' => request('beschikbaar_vanaf'),
            'beschikbaar_tot' => request('beschikbaar_tot'),
            'beschikbaarheid' => json_encode($beschikbaarheid, true)
        ]);

        return redirect()->route('werknemers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        $module = [
            'name' => 'Werknemer',
            'resourceful' => 'werknemers',
        ];

        $data['module'] = $module;
        $data['item'] = $employee;

        return view('werknemers.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employeeID)
    {
        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];

        $employee = Employee::where('id', $employeeID)->get()->first();

        $b = json_decode($employee->beschikbaarheid);

        foreach ($b as $key=>$day) {
            $o = $key . '1';
            $m = $key . '2';
            $employee->$o = $day->ochtend;
            $employee->$m = $day->middag;
        }

        $data['item'] = $employee;
        $data['employee'] = $employee;
        $data['module'] = $module;

        return view('werknemers.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employeeID)
    {

        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];

        $employee = Employee::where('id', $employeeID)->get()->first();

        $employee->naam = $request->naam;
        $employee->adres = $request->adres;
        $employee->birthday = $request->birthday;
        $employee->postcode = $request->postcode;
        $employee->stad = $request->stad;
        $employee->telefoon = $request->telefoon;
        $employee->email = $request->email;
        $employee->ervaring = $request->ervaring;
        $employee->schaal = $request->schaal;
        $employee->systeem = implode(',', $request->systeem);
        $employee->salarisnummer = $request->salarisnummer;
        $employee->periodiek = $request->periodiek;
        $employee->beschikbaar_tot = $request->beschikbaar_tot;
        $employee->beschikbaar_vanaf = $request->beschikbaar_vanaf;

        $beschikbaarheid = collect([
            'Monday' => ["ochtend" => (is_null($request->Monday1) ? 0 : 1),
            "middag" => (is_null($request->Monday2)? 0 : 1)],
            'Tuesday' => ["ochtend" => (is_null($request->Tuesday1)? 0 : 1),
            "middag" => (is_null($request->Tuesday2)? 0 : 1)],
            'Wednesday' => ["ochtend" => (is_null($request->Wednesday1)? 0 : 1),
            'middag' => (is_null($request->Wednesday2)? 0 : 1)],
            'Thursday' => ["ochtend" => (is_null($request->Thursday1)? 0 : 1),
            'middag' => (is_null($request->Thursday2)? 0 : 1)],
            'Friday' => ["ochtend" => (is_null($request->Friday1)? 0 : 1),
            'middag' => (is_null($request->Friday2)? 0 : 1)]
        ]);
        $employee->beschikbaarheid = json_encode($beschikbaarheid, true);
        $employee->save();

        return redirect()->route($module['resourceful'] . '.index')->with('msg', 'Gegevens werknemer gewijzigd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeeID)
    {
        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];

        $employee = Employee::where('id', $employeeID)->get()->first();
        $employee->delete();

        return redirect()->route($module['resourceful'] . '.index')->with('msg', 'Werknemer verwijderd');
    }
    public function inplannen(Request $request)
    {
        try
        {
            $employeeID = request('id');
            $date = request('date');
            $status = request('status');
            $dagdeel = request('dagdeel');


            $employee = Employee::where('id', $employeeID)->get()->first();
            $ingepland = collect(json_decode($employee->ingepland));

            if ($ingepland->has($date)) {
                $ingepland->get($date)->$dagdeel = $status;
            } else {
                if ($dagdeel == 'ochtend') {
                    $ingepland->put($date, ['ochtend' => $status, 'middag' => '']);
                } else {
                    $ingepland->put($date, ['middag' => $status, 'ochtend' => '']);
                }
            }
            $employee->ingepland = json_encode($ingepland);
            $employee->save();

            echo "1";
        }
        catch (Exception $e){
            echo "0";
        }
    }



    public function getBeschikbaarheid($employee)
    {
        $now = Carbon::now();
        $startingDate = $now->startOfWeek();
        $monday = $startingDate;

        $ingepland = collect(json_decode($employee->ingepland));
        $weeks = 20;
        $week = 0;
        $b = collect();

        $origin = $employee->beschikbaarheid;

        while ($week < $weeks) {

            $weekn = $monday->weekOfYear;
            $weekcol = collect();
            $weeka = $origin;

            foreach ($weeka as $dag) {

                $d = collect();
                $d->date = $startingDate->format('Y-m-d');

                if (($startingDate >= $employee->beschikbaar_vanaf)
                    & ($startingDate <= $employee->beschikbaar_tot)) {

                    if ($ingepland->has($d->date)) {
                        $d->ochtend = $ingepland->get($d->date)->{"ochtend"};

                        $d->middag = $ingepland->get($d->date)->{"middag"};
                        if ($d->middag == "") {
                            $d->middag = $dag->middag;
                        }
                        if ($d->ochtend == "") {
                            $d->ochtend = $dag->ochtend;
                        }
                    } else {
                        $d->ochtend = $dag->ochtend;
                        $d->middag = $dag->middag;
                    }
                } else {
                    $d->ochtend = 0;
                    $d->middag = 0;
                }

                $weekcol->put($d->date, $d);
                $startingDate->addDays(1);
            }
            $b->put($weekn, $weekcol);
            $startingDate = $startingDate->addDays(2); #Van vrijdag naar maandag
            $week++;
        }
        $employee->beschikbaarheid = $b;
    }

    public function getEmployee($id)
    {
        $module = ['name'=>'Werknemer',
                'resourceful'=>'werknemers'];
        $data['module'] = $module;
        $employee = Employee::where('id', $id)->get()->first();
        $employee->beschikbaarheid = json_decode($employee->beschikbaarheid);

        $this->getBeschikbaarheid($employee);



        $data['item'] = $employee;

        return view('werknemers.werknemer.index')->with($data);
    }
}
