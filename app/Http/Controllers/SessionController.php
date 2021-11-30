<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setSession(Request $request) {
        $request->session()->put('key','Virat Gandhi');
    }
    public function accessSessionData(Request $request) {
        if($request->session()->has('key'))
           echo $request->session()->get('key');
        else
           echo 'No data in the session';
     }
}
