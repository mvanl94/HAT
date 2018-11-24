<?php

namespace App\Http\Controllers;

use App\Models\Huisarts;
use Illuminate\Http\Request;

class HuisartsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huisartsen = Huisarts::all();
        $data['datatable'] = $dataTable = 'ajax';
        $data['huisartsen'] = $huisartsen;
        return view('huisartsen.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('huisartsen.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $huisarts = new Huisarts;
        $huisarts->praktijknaam = $request->praktijknaam;
        $huisarts->adres = $request->adres;
        $huisarts->postcode = $request->postcode;
        $huisarts->telefoon = $request->telefoon;
        $huisarts->email = $request->email;
        $huisarts->contactpersoon = $request->contactpersoon;
        $huisarts->telefoon_contactpersoon = $request->telefoon_contactpersoon;

        $huisarts->save();

        return redirect()->route('huisartsen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Huisarts  $huisarts
     * @return \Illuminate\Http\Response
     */
    public function show(Huisarts $huisarts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Huisarts  $huisarts
     * @return \Illuminate\Http\Response
     */
    public function edit(Huisarts $huisarts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Huisarts  $huisarts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Huisarts $huisarts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Huisarts  $huisarts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Huisarts $huisarts)
    {
        //
    }
}
