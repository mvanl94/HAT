<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;

class PagesController extends Controller
{
    public function getHome(){
      $google2fa = new Google2FA();

      $fa= $google2fa->generateSecretKey();

      return view('home')->with('fa',$fa);
    }

    public function getAbout(){
      return view('about');
    }

    public function getContact(){
      return view('contact');
    }
}
