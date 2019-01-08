<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function redirect()
     {
         if (auth()->check()) {
             return redirect()->route('werknemers.index');
            /**
            * Pas bij andere rollen dan admin
            **/
             // if(auth()->user()->hasRole('admin')) {
             //     return redirect()->route('werknemers');
             // } else {
             //     return view('werknemers.index');
             // }
         }
         return redirect()->route('login');
     }
}
